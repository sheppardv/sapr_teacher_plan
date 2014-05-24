<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    'Positions' => array('admin'),
    $model->name => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create Position', 'url' => array('create')),
    array('label' => 'View Position', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage Position', 'url' => array('admin')),
);
?>

    <h1>Update Position <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>