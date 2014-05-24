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
        <?php echo $form->labelEx($model, 'numberSemestr'); ?>
        <?php echo $form->textField($model, 'numberSemestr'); ?>
        <?php echo $form->error($model, 'numberSemestr'); ?>
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
        <?php echo $form->labelEx($model, 'numberSemester'); ?>
        <?php echo $form->textField($model, 'numberSemester'); ?>
        <?php echo $form->error($model, 'numberSemester'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countLecture'); ?>
        <?php echo $form->textField($model, 'countLecture'); ?>
        <?php echo $form->error($model, 'countLecture'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countPractic'); ?>
        <?php echo $form->textField($model, 'countPractic'); ?>
        <?php echo $form->error($model, 'countPractic'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countLab'); ?>
        <?php echo $form->textField($model, 'countLab'); ?>
        <?php echo $form->error($model, 'countLab'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countConsultation'); ?>
        <?php echo $form->textField($model, 'countConsultation'); ?>
        <?php echo $form->error($model, 'countConsultation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countDiploma'); ?>
        <?php echo $form->textField($model, 'countDiploma'); ?>
        <?php echo $form->error($model, 'countDiploma'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countCoursework'); ?>
        <?php echo $form->textField($model, 'countCoursework'); ?>
        <?php echo $form->error($model, 'countCoursework'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countZalick'); ?>
        <?php echo $form->textField($model, 'countZalick'); ?>
        <?php echo $form->error($model, 'countZalick'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countExams'); ?>
        <?php echo $form->textField($model, 'countExams'); ?>
        <?php echo $form->error($model, 'countExams'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countModulework'); ?>
        <?php echo $form->textField($model, 'countModulework'); ?>
        <?php echo $form->error($model, 'countModulework'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countPostgraduate'); ?>
        <?php echo $form->textField($model, 'countPostgraduate'); ?>
        <?php echo $form->error($model, 'countPostgraduate'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countPracticeLead'); ?>
        <?php echo $form->textField($model, 'countPracticeLead'); ?>
        <?php echo $form->error($model, 'countPracticeLead'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countControlWork'); ?>
        <?php echo $form->textField($model, 'countControlWork'); ?>
        <?php echo $form->error($model, 'countControlWork'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countCalculateWork'); ?>
        <?php echo $form->textField($model, 'countCalculateWork'); ?>
        <?php echo $form->error($model, 'countCalculateWork'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'countDEK'); ?>
        <?php echo $form->textField($model, 'countDEK'); ?>
        <?php echo $form->error($model, 'countDEK'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->