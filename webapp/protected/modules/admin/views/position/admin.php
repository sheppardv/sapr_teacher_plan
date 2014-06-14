<?php
/* @var $this PositionController */
/* @var $model Position */

$this->breadcrumbs = array(
    'Positions' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Create Position', 'url' => array('create')),
);

?>

<h1>Manage Positions</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.BsGridView', array(
    'id' => 'position-grid',
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
