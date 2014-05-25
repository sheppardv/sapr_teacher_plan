<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */

$this->breadcrumbs = array(
    'Teacher Plans' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create TeacherPlan', 'url' => array('create')),
);
?>

<style>
    #page {
        width: 1347px;
    }
</style>

<h1>Manage Teacher Plans</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'teacher-plan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',

        [
            'name'=>'teacher_search',
            'value'=>'$data->teacher->fullName'
        ],

        [
            'name'=>'subject_search',
            'value'=>'$data->subject->name'
        ],

        [
            'name'=>'speciality_search',
            'value'=>'$data->speciality->name'
        ],

        [
            'name'=>'activity_search',
            'value'=>'$data->activity->name'
        ],

        'numberSemester',

        'countHours',

        'changed_at',
        'created_at',

        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
