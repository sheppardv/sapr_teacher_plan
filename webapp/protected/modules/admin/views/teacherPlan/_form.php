<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'teacher-plan-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_id'); ?>
        <?php echo $form->dropDownList($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'fullName')); ?>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'subject_id'); ?>
        <?php echo $form->dropDownList($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'subject_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'speciality_id'); ?>
        <?php echo $form->dropDownList($model, 'speciality_id', CHtml::listData(Speciality::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'speciality_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'activity_id'); ?>
        <?php echo $form->dropDownList($model, 'activity_id', CHtml::listData(Activity::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'activity_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'numberSemester'); ?>
        <?php echo $form->dropDownList($model, 'numberSemester', array_combine([1, 2], [1, 2])); ?>
        <?php echo $form->error($model, 'numberSemester'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countHours'); ?>
        <?php echo $form->textField($model, 'countHours'); ?>
        <?php echo $form->error($model, 'countHours'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->