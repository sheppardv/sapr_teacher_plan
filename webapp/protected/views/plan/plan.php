<?php
/* @var $this SubjectController */

/* @var $data string[[][[[][]]]] */
/* @var $totalActivityHoursBySemester string[[]] */

$this->breadcrumbs = array(
    'Plan',
);

$this->menu = array();
?>

<h1>Semesters plan</h1>
<table class="table table-striped table-bordered table-hover table-condensed">
<?php
foreach ($data['semesters'] as $numSemester => $semesterData) : ?>
    <tr><td colspan="4">Семестер <?php echo $numSemester; ?></td></tr>
        <tr>
            <td>№</td>
            <?php foreach ($data['headers'] as $tableHeader) : ?>
                <td><? echo $tableHeader; ?></td>
            <?php endforeach; ?>
        </tr>

        <?php
        $i = 1;
        foreach ($data['semesters'][$numSemester] as $row) : ?>
            <tr>
                <td><? echo $i++; ?></td>
                <?php foreach ($row as $cell): ?>
                    <td><? echo $cell; ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>

        <tr>
            <td></td>
            <?php
            $total = 0;
            foreach ($data['headers'] as $tableHeader) : ?>
                <?php if (isset($totalActivityHoursBySemester[$numSemester][$tableHeader])) : ?>
                    <td><?
                        $total += $totalActivityHoursBySemester[$numSemester][$tableHeader];
                        echo $totalActivityHoursBySemester[$numSemester][$tableHeader];
                        ?></td>
                <?php elseif ($tableHeader == 'Всього'): ?>
                    <td><?php echo $total ?></td>
                <?php
                else : ?>
                    <td></td>
                <?php endif; ?>
            <?php endforeach; ?>
        </tr>

<?php endforeach; ?>

    <tr><td colspan="4"></td></tr>
    <tr>
        <td></td>
        <?php

        $total = 0;
        $totalActivitySum = [];

        foreach ($totalActivityHoursBySemester as $numSemester => $semData) {
            foreach ($semData as $activityName => $activityHours) {
                if(!isset($totalActivitySum[$activityName])){
                    $totalActivitySum[$activityName] = 0;
                }

                $totalActivitySum[$activityName] += $activityHours;
            }
        }

        foreach ($data['headers'] as $tableHeader) : ?>
            <?php if (isset($totalActivitySum[$tableHeader])) : ?>
                <td><?
                    echo $totalActivitySum[$tableHeader];
                    $total += $totalActivitySum[$tableHeader];
                    ?>
                </td>
            <?php elseif ($tableHeader == 'Всього'): ?>
                <td><?php echo $total ?></td>
            <?php
            else : ?>
                <td></td>
            <?php endif; ?>
        <?php endforeach; ?>
    </tr>
</table>




