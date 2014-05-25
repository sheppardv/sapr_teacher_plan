<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */

$this->breadcrumbs = array(
    'Teacher Plans' => array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'Create TeacherPlan', 'url' => array('create')),
    array('label' => 'Update TeacherPlan', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete TeacherPlan', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage TeacherPlan', 'url' => array('admin')),
);
?>

<h1>View TeacherPlan #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        [
            'name' => 'user_id',
            'value' => $model->teacher->fullname,
        ],

        'numberSemester',

        [
            'name' => 'subject_id',
            'value' => $model->subject->name,
        ],

        [
            'name' => 'speciality_id',
            'value' => $model->speciality->name,
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
