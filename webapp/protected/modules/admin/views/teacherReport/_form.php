<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'teacher-report-form',
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
        <?php echo $form->labelEx($model, 'dateActivity'); ?>
        <!--        --><?php //echo $form->textField($model, 'dateActivity'); ?>

        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'dateActivity',
//            'name'=>'datepicker-other-month',
            'flat' => true, //remove to hide the datepicker
            'options' => array(
                'showAnim' => 'slide', //'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                'showOtherMonths' => true, // Show Other month in jquery
                'selectOtherMonths' => true, // Select Other month in jquery
            ),
            'htmlOptions' => array(
                'style' => ''
            ),
        ));
        ?>

        <?php echo $form->error($model, 'dateActivity'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'topicName'); ?>
        <?php echo $form->textField($model, 'topicName', array('size' => 60, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'topicName'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'activity_id'); ?>
        <?php echo $form->dropDownList($model, 'activity_id', CHtml::listData(Activity::model()->findAll(), 'id', 'name')); ?>
        <?php echo $form->error($model, 'activity_id'); ?>
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