<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs = array(
    'Plan',
);

$this->menu = array();
?>

<h1>Manage Subjects</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'teacher-plan-grid',
    'dataProvider' => $model->search(true),
    'filter' => $model,
    'columns' => array(
        'id',

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
