<?php
/* @var $this SubjectController */
/* @var $model Subject */

$this->breadcrumbs = array(
    'Subjects',
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Subject', 'url' => array('create')),
);

?>

<h1>Manage Subjects</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'subject-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        [
            'name' => 'id',
            'htmlOptions' => [
                'class' => 'id-column'
            ]
        ],
        'name',

        [
            'name' => 'created_at',
            'htmlOptions' => [
                'class' => 'date-column'
            ]
        ],


        [
            'name' => 'changed_at',
            'htmlOptions' => [
                'class' => 'date-column'
            ]
        ],

        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>

