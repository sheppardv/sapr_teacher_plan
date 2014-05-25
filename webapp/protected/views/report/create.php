<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */

$this->breadcrumbs = array(
    'Reports' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Report', 'url' => array('admin')),
);
?>

    <h1>Create TeacherReport</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>