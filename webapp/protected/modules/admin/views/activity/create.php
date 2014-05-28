<?php
/* @var $this ActivityController */
/* @var $model Activity */

$this->breadcrumbs=array(
	'Activities'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Activity', 'url'=>array('admin')),
);
?>

<h1>Create Activity</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>