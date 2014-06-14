<?php
/* @var $this PositionController */
/* @var $model Position */
/* @var $form BsActiveForm */
?>

<div class="md-col-4">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'subject-form',
        'htmlOptions' => array(
            'class' => 'bs-example'
        )
    ));
    ?>
    <?php
    echo $form->textFieldControlGroup($model, 'name');
    ?>
    <?php
    echo BsHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array(
        'color' => BsHtml::BUTTON_COLOR_PRIMARY
    ));
    ?>
    <?php
    $this->endWidget();
    ?>
</div>
