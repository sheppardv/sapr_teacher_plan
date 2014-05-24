<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
    'Users' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create User', 'url' => array('create')),
    array('label' => 'View User', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage User', 'url' => array('admin')),
);
?>

    <h1>Update User <?php echo $model->id; ?> <?php echo $model->getFullName(); ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>