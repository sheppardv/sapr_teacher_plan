<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('firstName')); ?>:</b>
    <?php echo CHtml::encode($data->firstName); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('lastName')); ?>:</b>
    <?php echo CHtml::encode($data->lastName); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('fatherName')); ?>:</b>
    <?php echo CHtml::encode($data->fatherName); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
    <?php echo CHtml::encode($data->password); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode($data->status); ?>
    <br/>

    <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
	<?php echo CHtml::encode($data->created_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed_at')); ?>:</b>
	<?php echo CHtml::encode($data->changed_at); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_visited_at')); ?>:</b>
	<?php echo CHtml::encode($data->last_visited_at); ?>
	<br />

	*/
    ?>

</div>