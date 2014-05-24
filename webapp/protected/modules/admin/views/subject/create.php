<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs = array(
    'Subjects' => array('admin'),
    'Create',
);

$this->menu = array(
    array('label' => 'Manage Subject', 'url' => array('admin')),
);
?>

    <h1>Create Subject</h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>