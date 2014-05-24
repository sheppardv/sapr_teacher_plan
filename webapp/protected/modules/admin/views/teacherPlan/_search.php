<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numberSemestr'); ?>
		<?php echo $form->textField($model,'numberSemestr'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subject_id'); ?>
		<?php echo $form->textField($model,'subject_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'speciality_id'); ?>
		<?php echo $form->textField($model,'speciality_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numberSemester'); ?>
		<?php echo $form->textField($model,'numberSemester'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countLecture'); ?>
		<?php echo $form->textField($model,'countLecture'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countPractic'); ?>
		<?php echo $form->textField($model,'countPractic'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countLab'); ?>
		<?php echo $form->textField($model,'countLab'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countConsultation'); ?>
		<?php echo $form->textField($model,'countConsultation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countDiploma'); ?>
		<?php echo $form->textField($model,'countDiploma'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countCoursework'); ?>
		<?php echo $form->textField($model,'countCoursework'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countZalick'); ?>
		<?php echo $form->textField($model,'countZalick'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countExams'); ?>
		<?php echo $form->textField($model,'countExams'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countModulework'); ?>
		<?php echo $form->textField($model,'countModulework'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countPostgraduate'); ?>
		<?php echo $form->textField($model,'countPostgraduate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countPracticeLead'); ?>
		<?php echo $form->textField($model,'countPracticeLead'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countControlWork'); ?>
		<?php echo $form->textField($model,'countControlWork'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countCalculateWork'); ?>
		<?php echo $form->textField($model,'countCalculateWork'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'countDEK'); ?>
		<?php echo $form->textField($model,'countDEK'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'changed_at'); ?>
		<?php echo $form->textField($model,'changed_at'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_at'); ?>
		<?php echo $form->textField($model,'created_at'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->