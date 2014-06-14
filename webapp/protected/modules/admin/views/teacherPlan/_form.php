<?php
/* @var $this TeacherPlanController */
/* @var $model TeacherPlan */
/* @var $form BsActiveForm */
?>

<div class="md-col-4">
    <?php
    $form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
        'id' => 'teacher-plan-form',
        'htmlOptions' => array(
            'class' => 'bs-example'
        )
    ));
    ?>
    <?php
    echo $form->dropDownListControlGroup($model, 'user_id', CHtml::listData(User::model()->findAll(), 'id', 'fullName'));
    echo $form->dropDownListControlGroup($model, 'subject_id', CHtml::listData(Subject::model()->findAll(), 'id', 'name'));
    echo $form->dropDownListControlGroup($model, 'speciality_id', CHtml::listData(Speciality::model()->findAll(), 'id', 'name'));
    echo $form->dropDownListControlGroup($model, 'activity_id', CHtml::listData(Activity::model()->findAll(), 'id', 'name'));
    echo $form->dropDownListControlGroup($model, 'numberSemester', array_combine([1, 2], [1, 2]));
    echo $form->textFieldControlGroup($model, 'countHours');
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
