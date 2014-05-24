<?php
/* @var $this SubjectController */
/* @var $data Subject */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('created_at')); ?>:</b>
    <?php echo CHtml::encode($data->created_at); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('changed_at')); ?>:</b>
    <?php echo CHtml::encode($data->changed_at); ?>
    <br/>


</div>