<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs=array(
	'Specialities'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create Speciality', 'url'=>array('create')),
	array('label'=>'View Speciality', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Speciality', 'url'=>array('admin')),
);
?>

<h1>Update Speciality <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>