<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    'Positions' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Position', 'url' => array('admin')),
);
?>

    <h1>Create Position</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>