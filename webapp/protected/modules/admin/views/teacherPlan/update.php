<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */

$this->breadcrumbs = array(
    'Teacher Plans' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);

$this->menu = array(
    array('label' => 'Create TeacherPlan', 'url' => array('create')),
    array('label' => 'View TeacherPlan', 'url' => array('view', 'id' => $model->id)),
    array('label' => 'Manage TeacherPlan', 'url' => array('admin')),
);
?>

    <h1>Update TeacherPlan <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>