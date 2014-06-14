<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */
/* @var $form BsActiveForm */
?>

<div class="md-col-4">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'teacher-report-form',
        'htmlOptions' => array(
            'class' => 'bs-example'
        )
    ));
    ?>
    <?php echo $form->dropDownListControlGroup($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'fullName')); ?>
    <?php echo $form->dropDownListControlGroup($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'name')); ?>
    <?php echo $form->labelEx($model, 'dateActivity'); ?>

    <?php echo $form->dropDownListControlGroup($model, 'activity_id', CHtml::listData(Activity::model()->findAll(), 'id', 'name')); ?>

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

    <?php echo $form->textFieldControlGroup($model, 'topicName'); ?>
    <?php echo $form->textFieldControlGroup($model, 'countHours'); ?>

    <?php
    echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>
    <?php
    $this->endWidget();
    ?>
</div>
