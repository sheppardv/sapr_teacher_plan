<?php
/* @var $this TeacherPlanController */
/* @var $data TeacherPlan */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numberSemestr')); ?>:</b>
	<?php echo CHtml::encode($data->numberSemestr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
	<?php echo CHtml::encode($data->subject_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('speciality_id')); ?>:</b>
	<?php echo CHtml::encode($data->speciality_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numberSemester')); ?>:</b>
	<?php echo CHtml::encode($data->numberSemester); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countLecture')); ?>:</b>
	<?php echo CHtml::encode($data->countLecture); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('countPractic')); ?>:</b>
	<?php echo CHtml::encode($data->countPractic); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countLab')); ?>:</b>
	<?php echo CHtml::encode($data->countLab); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countConsultation')); ?>:</b>
	<?php echo CHtml::encode($data->countConsultation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countDiploma')); ?>:</b>
	<?php echo CHtml::encode($data->countDiploma); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countCoursework')); ?>:</b>
	<?php echo CHtml::encode($data->countCoursework); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countZalick')); ?>:</b>
	<?php echo CHtml::encode($data->countZalick); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countExams')); ?>:</b>
	<?php echo CHtml::encode($data->countExams); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countModulework')); ?>:</b>
	<?php echo CHtml::encode($data->countModulework); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countPostgraduate')); ?>:</b>
	<?php echo CHtml::encode($data->countPostgraduate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countPracticeLead')); ?>:</b>
	<?php echo CHtml::encode($data->countPracticeLead); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countControlWork')); ?>:</b>
	<?php echo CHtml::encode($data->countControlWork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countCalculateWork')); ?>:</b>
	<?php echo CHtml::encode($data->countCalculateWork); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('countDEK')); ?>:</b>
	<?php echo CHtml::encode($data->countDEK); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed_at')); ?>:</b>
	<?php echo CHtml::encode($data->changed_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	*/ ?>

</div>