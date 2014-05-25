<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */

$this->breadcrumbs = array(
    'Teacher Reports' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create TeacherReport', 'url' => array('create')),
    array('label' => 'View TeacherReport', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage TeacherReport', 'url' => array('admin')),
);
?>

    <h1>Update TeacherReport <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>