<?php
/* @var $this SubjectController */
/* @var $data string[] */
/* @var $tableHeaders string[] */
/* @var $foundActivities string[] */

$this->breadcrumbs = array(
    'Plan',
);

$this->menu = array();
?>

<h1>Manage Subjects</h1>


<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        text-align: justify;
    }
</style>


<table>
    <tr>
        <?php foreach ($tableHeaders as $tableHeader) : ?>
            <td><? echo $tableHeader; ?></td>
        <?php endforeach; ?>
    </tr>

    <?php
    $i = 1;
    foreach ($data as $semester => $subjects) : ?>
        <?php foreach ($subjects as $subjectName => $specialities): ?>
            <tr>
                <td><? echo $i++; ?></td>
                <td><? echo $subjectName; ?></td>

                <?php foreach ($specialities as $specialityName => $activities): ?>
                    <td><? echo $specialityName; ?></td>
                    <?php
                    $foundHere = false;
                    foreach ($foundActivities as $foundActivityName): ?>
                        <? if (isset($activities[$foundActivityName])):?>
                            <td><? echo $activities[$foundActivityName]; $foundHere = true; ?></td>
                        <? endif; ?>
                    <?php endforeach; ?>

                    <? if (!$foundHere):?>
                        <td>-</td>
                    <? endif; ?>

                <?php endforeach; ?>

            </tr>
        <?php endforeach; ?>
    <?php endforeach; ?>
</table>
