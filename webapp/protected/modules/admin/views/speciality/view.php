<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs=array(
	'Specialities'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Create Speciality', 'url'=>array('create')),
	array('label'=>'Update Speciality', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Speciality', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Speciality', 'url'=>array('admin')),
);
?>

<h1>View Speciality #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'countStudents',
		'created_at',
		'changed_at',
	),
)); ?>
