<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form BsActiveForm */
?>

<div class="col-md-5">

    <?php $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model, 'email', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'email'); ?>

    <?php echo $form->textFieldControlGroup($model, 'firstName', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'firstName'); ?>

    <?php echo $form->textFieldControlGroup($model, 'lastName', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'lastName'); ?>

    <?php echo $form->textFieldControlGroup($model, 'fatherName', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'fatherName'); ?>

    <?php echo $form->dropDownListControlGroup($model, 'position_id', CHtml::listData(Position::model()->findAll(), 'id', 'name')); ?>
    <?php echo $form->error($model, 'position_id'); ?>

    <?php echo $form->passwordFieldControlGroup($model, 'newPassword', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'newPassword'); ?>

    <?php
    echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->