<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */
/* @var $form BsActiveForm */
?>

<div class="col-md-5">

    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'enableAjaxValidation' => false,
        'id' => 'teacher-report-form',
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->dropDownListControlGroup($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'name')); ?>
    <?php echo $form->error($model, 'subject_id'); ?>

    <?php echo $form->labelEx($model, 'dateActivity'); ?>
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

    <?php echo $form->textFieldControlGroup($model, 'topicName', array('size' => 60, 'maxlength' => 255)); ?>
    <?php echo $form->error($model, 'topicName'); ?>

    <?php echo $form->dropDownListControlGroup($model, 'activity_id', CHtml::listData(Activity::model()->findAll(), 'id', 'name')); ?>
    <?php echo $form->error($model, 'activity_id'); ?>

    <?php echo $form->textFieldControlGroup($model, 'countHours'); ?>
    <?php echo $form->error($model, 'countHours'); ?>


    <?php
    echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->