<?php
/**
 * @var string[] $data
 * @var string[] $foundActivities
 * @var string[] $totalHoursByActivity
 */
?>

<style>
    table,th,td
    {
        border:1px solid black;
        border-collapse:collapse;
        text-align: justify;
    }
</style>


<table>
    <tr>
        <td>#</td>
        <td>Name</td>
        <td>Position</td>
        <?php foreach ($foundActivities as $foundActivity) : ?>
            <td><? echo $foundActivity; ?></td>
        <?php endforeach; ?>
        <td>Reported hours</td>
        <td>Planed hours</td>
    </tr>
    <?php
    $i = 1;
    foreach ($data as $key => $row) : ?>
        <tr>
            <td><? echo $i++; ?></td>
            <td><? echo $data[$key]['fullName']; ?></td>
            <td><? echo $data[$key]['positionName']; ?></td>

            <?php foreach ($foundActivities as $foundActivity) : ?>
                <td><? echo isset($data[$key][$foundActivity]) ? $data[$key][$foundActivity] : 0; ?></td>
            <?php endforeach; ?>

            <td><? echo $data[$key]['reportedHours']; ?></td>
            <td><? echo $data[$key]['planedHours']; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td></td>
        <td colspan="2">Total</td>

        <?php foreach ($totalHoursByActivity as $tha) : ?>
            <td><? echo $tha; ?></td>
        <?php endforeach; ?>
    </tr>
</table>