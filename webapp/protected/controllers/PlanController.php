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
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
            ),
            array('deny'),
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

        $teacherPlans = TeacherPlan::model()->with(['activity', 'speciality', 'subject'])->together()->findAllByAttributes(['user_id' => $user_id]);

        $data = [];
        $tableHeaders = ['Назва дисципліни', 'Спец.', "К-ть."];
        $foundActivities = [];
        $totalActivityHoursBySemesterAndSubject = [];
        $totalActivityHoursBySemester = [];

        foreach ($teacherPlans as $tp) {
            if (!isset($totalActivityHoursBySemesterAndSubject[$tp->numberSemester][$tp->subject->name])) {
                $totalActivityHoursBySemesterAndSubject[$tp->numberSemester][$tp->subject->name] = 0;
            }


            if (!isset($totalActivityHoursBySemester[$tp->numberSemester][$tp->activity->name])) {
                $totalActivityHoursBySemester[$tp->numberSemester][$tp->activity->name] = 0;
            }

            $totalActivityHoursBySemesterAndSubject[$tp->numberSemester][$tp->subject->name] += (int)$tp->countHours;

            if (!in_array($tp->activity->name, $tableHeaders)) {
                $foundActivities[] = $tp->activity->name;
                $tableHeaders[] = $tp->activity->name;
            }

            if(isset($data[$tp->numberSemester][$tp->subject->name])){
                $data[$tp->numberSemester][$tp->subject->name]['activities'][$tp->activity->name] = (int)$tp->countHours;

            } else {
                $row = [
                    'speciality_name' => [
                        $tp->speciality->name => $tp->speciality->countStudents
                    ],
                    'activities' => [
                        $tp->activity->name => (int)$tp->countHours
                    ],
                ];

                $data[$tp->numberSemester][$tp->subject->name] = $row;
            }

            $totalActivityHoursBySemester[$tp->numberSemester][$tp->activity->name] += (int)$tp->countHours;
        }


        $tableHeaders[] = 'Всього';

        $viewData = [];
        $viewData['headers'] = $tableHeaders;
        foreach ($data as $numSemester => $semesterData) {

            foreach ($semesterData as $subjectName => $subjectData) {
                $row = [];
                $row[] = $subjectName;

                $row[] = array_keys($subjectData['speciality_name'])[0];
                $row[] = array_values($subjectData['speciality_name'])[0];

                foreach ($foundActivities as $foundActivity ){
                    if(isset($subjectData['activities'][$foundActivity])){
                        $row[] = $subjectData['activities'][$foundActivity];
                    } else {
                        $row[] = 0;
                    }
                }

                $row[] = $totalActivityHoursBySemesterAndSubject[$numSemester][$subjectName];

                $viewData['semesters'][$numSemester][] = $row;
            }
        }


        $this->render('plan', array(
            'data' => $viewData,
            'totalActivityHoursBySemester' => $totalActivityHoursBySemester,
        ));
    }

}
