<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs=array(
	'Specialities'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Speciality', 'url'=>array('admin')),
);
?>

<h1>Create Speciality</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>