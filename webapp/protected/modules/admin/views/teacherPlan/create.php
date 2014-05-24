<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */

$this->breadcrumbs=array(
	'Teacher Plans'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage TeacherPlan', 'url'=>array('admin')),
);
?>

<h1>Create TeacherPlan</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>