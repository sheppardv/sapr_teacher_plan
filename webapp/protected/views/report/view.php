<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */

$this->breadcrumbs = array(
    'Reports' => array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Create Report', 'url' => array('create')),
    array('label' => 'Update Report', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Report', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Report', 'url' => array('admin')),
);
?>

<h1>View TeacherReport #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'user_id',

        'dateActivity',
        'topicName',

        [
            'name' => 'subject_id',
            'value' => $model->subject->name,
        ],

        [
            'name' => 'activity_id',
            'value' => $model->activity->name,
        ],

        'countHours',

        'changed_at',
        'created_at',
    ),
)); ?>
