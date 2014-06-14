<?php
/* @var $this SpecialityController */
/* @var $model Speciality */
/* @var $form BsActiveForm */
?>

<div class="col-md-4">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'speciality-form',
        'htmlOptions' => array(
            'class' => 'bs-example'
        )
    ));
    ?>
    <?php
    echo $form->textFieldControlGroup($model, 'name');
    ?>
    <?php
    echo $form->textFieldControlGroup($model, 'countStudents');
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

