<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */

$this->breadcrumbs = array(
    'Teacher Reports' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List TeacherReport', 'url' => array('admin')),
    array('label' => 'Create TeacherReport', 'url' => array('create')),
);

?>

<h1>Manage Teacher Reports</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'teacher-report-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        [
            'name' => 'id',
            'htmlOptions' => [
                'class' => 'id-column'
            ]
        ],
        'dateActivity',
        'topicName',
        [
            'name'=>'teacher_search',
            'value'=>'$data->teacher->fullName'
        ],

        [
            'name'=>'subject_search',
            'value'=>'$data->subject->name'
        ],

        [
            'name'=>'activity_search',
            'value'=>'$data->activity->name'
        ],

        'countHours',

        [
            'name' => 'changed_at',
            'htmlOptions' => [
                'class' => 'date-column'
            ]
        ],

        [
            'name' => 'created_at',
            'htmlOptions' => [
                'class' => 'date-column'
            ]
        ],

        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
