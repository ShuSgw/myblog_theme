<?php /* Page Single */?>
<?php get_header(); ?>
<div class='container-fluid'>
    <div class='row flex-nowrap'>
        <div class="d-none d-lg-block bg-theme myblog_sidebar pt-3 pr-3 pl-3 border-right">
            <?php get_template_part('./components/nav/nav'); ?>
        </div>
        <div>
            <?php get_template_part('./components/main/main'); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>