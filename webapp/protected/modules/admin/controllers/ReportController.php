<?php

class ReportController extends BackendController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'postOnly + delete', // we only allow deletion via POST request
//            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionTotal()
    {
        function getFullName($DbItem){
            return $DbItem['lastName'] . ' ' . $DbItem['fatherName'] . ' ' . $DbItem['firstName'];
        }

        $SQL = <<<SQL
SELECT
*,
p.name AS positionName,
a.name as activityName,
a.id as activityId,

(
SELECT SUM(tr.countHours)
FROM teacherReport tr
WHERE tr.user_id = tp.user_id AND YEAR(tr.created_at) = YEAR(tp.created_at)
) as reportedHours

FROM teacherPlan tp
JOIN activity a ON a.id = tp.activity_id
JOIN `user` u ON u.id = tp.user_id
JOIN `position` p ON p.id = u.position_id
SQL;


        $fromDb = Yii::app()->db->createCommand($SQL)->queryAll();
        $arr = [];

        $userTotalHours = [];
        $totalHoursByActivity = [];
        $foundActivities = [];

        $totalPlanedHours = 0;
        $totalReportedHours = 0;

        foreach ($fromDb as $fromDbItem) {
            $user_id = $fromDbItem['user_id'];
            if(!isset($arr[$user_id])){
                $arr[$user_id] = [
                    'fullName' =>  getFullName($fromDbItem),
                    'positionName' =>  $fromDbItem['positionName'],
                    'reportedHours' =>  (int)$fromDbItem['reportedHours'],
                ];
                $userTotalHours[$fromDbItem['user_id']]['planed'] = 0;
                $userTotalHours[$fromDbItem['user_id']]['reported'] = (int)$fromDbItem['reportedHours'];
            }

            if(!isset( $totalHoursByActivity[$fromDbItem['activityName']])){
                $totalHoursByActivity[$fromDbItem['activityName']] = 0;
            }

            $totalHoursByActivity[$fromDbItem['activityName']] += (int)$fromDbItem['countHours'];

            $arr[$user_id][$fromDbItem['activityName']] = (int)$fromDbItem['countHours'];

            $userTotalHours[$user_id]['planed'] += (int)$fromDbItem['countHours'];

            $foundActivities[$fromDbItem['activityId']] = $fromDbItem['activityName'];
        }

        foreach ($userTotalHours as $user_id => $hours){
            $arr[$user_id]['planedHours'] = $hours['planed'];
            $totalPlanedHours += (int)$hours['planed'];
            $totalReportedHours += (int)$hours['reported'];
        }

        $totalHoursByActivity['totalReportedHours'] = $totalReportedHours;
        $totalHoursByActivity['totalPlanedHours'] = $totalPlanedHours;

        $this->render('total', array(
            'data' => $arr,
            'foundActivities' => $foundActivities,
            'totalHoursByActivity' => $totalHoursByActivity,
        ));
    }
}
