<?php /* @var $this Controller */ ?>
<?php $this->beginContent('/layouts/main'); ?>
    <div id="content" class="col-md-9">
        <?php echo $content; ?>
    </div><!-- content -->
    <div id="sidebar" class="col-md-3">
        <?php
        echo BsHtml::stackedPills($this->menu, array(
            'style' => 'max-width:200px'
        ));
        ?>
    </div><!-- sidebar -->
<?php $this->endContent(); ?>