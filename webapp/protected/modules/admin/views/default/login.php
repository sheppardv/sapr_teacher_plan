<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form BsActiveForm */

$this->pageTitle = Yii::app()->name . ' -  Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<h1>Admin Login</h1>

<div class="md-col-4">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'subject-form',
        'htmlOptions' => array(
            'class' => 'bs-example'
        )
    ));
    ?>
    <?php echo $form->textFieldControlGroup($model, 'email'); ?>
    <?php echo $form->passwordFieldControlGroup($model, 'password'); ?>
    <?php
    echo BsHtml::submitButton('Login', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    $this->endWidget();
    ?>
</div>