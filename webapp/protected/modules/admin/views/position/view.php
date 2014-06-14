<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    'Positions' => array('admin'),
    $model->name,
);

$this->menu = array(
    array('label' => 'Create Position', 'url' => array('create')),
    array('label' => 'Update Position', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Position', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Position', 'url' => array('admin')),
);
?>

<h1>View Position #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BsDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
        'created_at',
        'changed_at',
    ),
)); ?>
