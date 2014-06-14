<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form BsActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div class="col-md-4">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'enableAjaxValidation' => true,
        'id' => 'user_form',
        'htmlOptions' => array(
            'class' => 'bs-example'
        )
    ));
    ?>
    <?php
    echo $form->textFieldControlGroup($model, 'email');
    ?>
    <?php
    echo $form->passwordFieldControlGroup($model, 'password');
    ?>
    <?php
    echo BsHtml::submitButton('Submit', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>
    <?php
    $this->endWidget();
    ?>
</div>


