<?php
/* @var $this TeacherReportController */
/* @var $model TeacherReport */

$this->breadcrumbs = array(
    'Reports' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Report', 'url' => array('create')),
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
    'dataProvider' => $model->search(true),
    'filter' => $model,
    'columns' => array(
        'id',
        'dateActivity',
        'topicName',

        [
            'name'=>'subject_search',
            'value'=>'$data->subject->name'
        ],

        [
            'name'=>'activity_search',
            'value'=>'$data->activity->name'
        ],

        'countHours',
        'changed_at',
        'created_at',

        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
