<?php
/* @var $this TeacherReportController */
/* @var $data TeacherReport */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('subject_id')); ?>:</b>
    <?php echo CHtml::encode($data->subject_id); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('dateActivity')); ?>:</b>
    <?php echo CHtml::encode($data->dateActivity); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('topicName')); ?>:</b>
    <?php echo CHtml::encode($data->topicName); ?>
    <br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('countHours')); ?>:</b>
	<?php echo CHtml::encode($data->countHours); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed_at')); ?>:</b>
	<?php echo CHtml::encode($data->changed_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

</div>