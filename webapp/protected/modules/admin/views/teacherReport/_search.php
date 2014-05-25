<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    )); ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'user_id'); ?>
        <?php echo $form->textField($model, 'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subject_id'); ?>
        <?php echo $form->textField($model, 'subject_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'dateActivity'); ?>
        <?php echo $form->textField($model, 'dateActivity'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'topicName'); ?>
        <?php echo $form->textField($model, 'topicName', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'typeActivity'); ?>
        <?php echo $form->textField($model, 'typeActivity', array('size' => 45, 'maxlength' => 45)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'countHours'); ?>
        <?php echo $form->textField($model, 'countHours'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'changed_at'); ?>
        <?php echo $form->textField($model, 'changed_at'); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_at'); ?>
        <?php echo $form->textField($model, 'created_at'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->