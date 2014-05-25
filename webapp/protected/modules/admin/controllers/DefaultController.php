<?php

class DefaultController extends BackendController
{
    public $layout = 'column2';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index'),
                'users' => array('?'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'users' => array('@'),
                'roles' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        if(!Yii::app()->user->isGuest){
            $this->redirect(array("user/admin"));
        }

        $loginForm = new LoginForm;

        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($loginForm);
            Yii::app()->end();
        }

        if (isset($_POST['LoginForm'])) {

            $loginForm->attributes = $_POST['LoginForm'];

            // validate user input and redirect to the previous page if valid
            if ($loginForm->validate() && $loginForm->login()) {
                $this->redirect(array("user/admin"));
            }

        }
        $this->render('login', array('model' => $loginForm));
    }

    public function actionGenerateAdmin()
    {
        $userModel = new User();
        $userModel->email = 'admin@admin.com';
        $userModel->firstName = 'test1';
        $userModel->lastName = 'test2';
        $userModel->fatherName = 'test3';
        $userModel->password = 'admin24';
        $userModel->type = User::TYPE_ADMIN;
        if (!$userModel->save()) {
            var_dump($userModel);
        } else {
            echo 'Admin generated successfully';
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect('index');
    }
}