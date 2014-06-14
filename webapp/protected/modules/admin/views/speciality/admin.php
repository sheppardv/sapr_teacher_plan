<?php
/* @var $this SpecialityController */
/* @var $model Speciality */

$this->breadcrumbs = array(
    'Specialities',
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Speciality', 'url' => array('create')),
);
?>

<h1>Manage Specialities</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'speciality-grid',
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
        'countStudents',
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
