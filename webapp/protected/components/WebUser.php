<?php

class WebUser extends CWebUser {

    public function checkAccess($operation, $params = array(), $allowCaching = true)
    {
        $userModel = User::model()->findByPk(Yii::app()->user->id);
        return $userModel->type == User::TYPE_ADMIN;
//        return parent::checkAccess($operation, $params, $allowCaching);
    }


    protected function afterLogin($fromCookie)
    {
        $userModel = User::model()->findByPk(Yii::app()->user->id);
        $userModel->last_visited_at = new CDbExpression('NOW()');
        $userModel->update(['last_visited_at']);

        parent::afterLogin($fromCookie);
    }

}