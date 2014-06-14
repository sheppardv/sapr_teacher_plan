<?php

class PlanController extends Controller
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
//            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $model = new TeacherPlan('search');

        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['TeacherPlan'])) {
            $model->attributes = $_GET['TeacherPlan'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionPlan()
    {
        $user_id = Yii::app()->user->id;
        $teacherPlans = TeacherPlan::model()->together()->findAllByAttributes(['user_id' => $user_id]);

        $data = [];
        $tableHeaders = ['#', 'Назва дисципліни', 'Спец.', "К-ть."];
        $foundActivities = [];
        $totalActivityHoursBySemester = [];

        foreach ($teacherPlans as $tp) {
            $subject = $tp->subject;
            $activities = Activity::model()->findAllBySql(<<<SQL
SELECT a.* FROM teacherPlan tp
JOIN activity a ON a.id = tp.activity_id
WHERE tp.user_id = $user_id and tp.subject_id = {$tp->subject_id}
SQL
);

            if (!isset($totalActivityHoursBySemester[$tp->numberSemester][$tp->subject->name])) {
                $totalActivityHoursBySemester[$tp->numberSemester][$tp->subject->name] = 0;
            }

            if (!in_array($tp->activity->name, $tableHeaders)) {
                $foundActivities[] = $tp->activity->name;
                $tableHeaders[] = $tp->activity->name;
            }
            $data[$tp->numberSemester][$tp->subject->name][$tp->speciality->name][$tp->activity->name] = (int)$tp->countHours;
            $totalActivityHoursBySemester[$tp->numberSemester][$tp->subject->name] += (int)$tp->countHours;
        }


        $tableHeaders[] = 'Всього';

        $viewData = [];
        foreach ($data as $semester => $subjects) {
            $viewData[$semester] = [];

            foreach ($subjects as $subjectName => $specialities) {

                foreach ($specialities as $speciality => $activities) {

                    foreach ($activities as $activity => $countHours) {
                        $viewData[$semester][$subjectName][$speciality][] = $countHours;

                    }
                }
            }
        }


        $this->render('admin', array(
            'data' => $data,
            'tableHeaders' => $tableHeaders,
            'foundActivities' => $foundActivities,
        ));
    }

}
