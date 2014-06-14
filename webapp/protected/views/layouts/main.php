<?php /* @var $this Controller */ ?>
<?php /* @var $content string */ ?>

<?php
$cs = Yii::app()->clientScript;

/**
 * StyleSHeets
 */
$cs
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

<style>
    .footer-wrapper {
        position: relative;
        height: 50px;
        margin-top: 10px;
        margin-left: 10px;
    }
</style>

<div class="container" id="page">

    <?php
    $this->widget('bootstrap.widgets.BsNavbar', array(
        'collapse' => true,
        'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME),
        'brandUrl' => Yii::app()->homeUrl,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.BsNav',
                'type' => 'navbar',
                'activateParents' => true,
                'items' => array(
                    array('label' => 'Home', 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest),
                    array('label' => 'Report', 'url' => array('/report'), 'visible' => !Yii::app()->user->isGuest),
                    array('label' => 'Plan', 'url' => array('/plan'), 'visible' => !Yii::app()->user->isGuest),
                    array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                )
            )
        )
    ));
    ?>

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
