<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs=array(
	'Positions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Position', 'url'=>array('create')),
);

?>

<h1>Manage Positions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'position-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'created_at',
		'changed_at',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
