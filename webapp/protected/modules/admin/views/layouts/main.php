<?php /* @var $this Controller */ ?>
<?php /* @var $content string */ ?>

<?php
$cs = Yii::app()->clientScript;

/**
 * StyleSHeets
 */
$cs
    ->registerCssFile('/css/common.css')
    ->registerCssFile('/css/bootstrap3/css/bootstrap.css')
    ->registerCssFile('/css/bootstrap3/css/bootstrap-theme.css');

/**
 * JavaScripts
 */
$cs
    ->registerCoreScript('jquery', CClientScript::POS_END)
    ->registerCoreScript('jquery.ui', CClientScript::POS_END)
    ->registerScriptFile('/css/bootstrap3/js/bootstrap.min.js', CClientScript::POS_END)

    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        , CClientScript::POS_READY);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">


    <?php
    $this->widget('bootstrap.widgets.BsNavbar', array(
        'collapse' => true,
        'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME),
        'color' => BsHtml::NAVBAR_COLOR_INVERSE,
        'brandUrl' => Yii::app()->homeUrl,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.BsNav',
                'type' => 'navbar',
                'activateParents' => true,
                'items' => array(
                    array('label' => 'User', 'url' => array('user/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Subject', 'url' => array('subject/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Position', 'url' => array('position/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Speciality', 'url' => array('speciality/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Activity', 'url' => array('activity/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Teacher plan', 'url' => array('teacherPlan/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Teacher reports', 'url' => array('teacherReport/admin'), 'visible' => Yii::app()->user->checkAccess('Admin')),
                    array('label' => 'Total report', 'url' => array('report/total'), 'visible' => Yii::app()->user->checkAccess('Admin')),

                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('logout'), 'visible' => !Yii::app()->user->isGuest)
                )
            )
        )
    ));
    ?>
    <!-- mainmenu -->
    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('bootstrap.widgets.BsBreadCrumb', array(
            'links' => $this->breadcrumbs,
            // will change the container to ul
            'tagName' => 'ul',
            // will generate the clickable breadcrumb links
            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
            // will generate the current page url : <li>News</li>
            'inactiveLinkTemplate' => '<li>{label}</li>',
            // will generate your homeurl item : <li><a href="/dr/dr/public_html/">Home</a></li>
            'homeLink' => BsHtml::openTag('li') . BsHtml::icon(BsHtml::GLYPHICON_HOME) . BsHtml::closeTag('li')
        ));
        ?><!-- breadcrumbs -->
    <?php endif ?>

    <?php echo $content; ?>

</div>

<div class="footer-wrapper">
    <footer>
        Copyright &copy; <?php echo date('Y'); ?> by Ruslan Voronyak.<br/>
        All Rights Reserved.<br/>
    </footer>
</div>

</body>
</html>
