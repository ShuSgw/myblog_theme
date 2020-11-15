<?php
$prevpost = get_adjacent_post(false, '', true); //前の記事
$nextpost = get_adjacent_post(false, '', false); //次の記事
?>
<?php if ($prevpost or $nextpost):?>
<div class='nextArticle'>
    <?php /*next article start*/?>
    <?php if ($nextpost):?>
    <a class='nextArticle_box nextArticle_box--next' href="<?php echo get_permalink($nextpost->ID); ?>">
        <?php echo get_the_post_thumbnail($nextpost->ID, 'next_thumb_onSingle'); ?>
        <div class="nextArticle_box_innerText">
            <?php echo get_the_title($nextpost->ID); ?>
        </div>
    </a>
    <?php /*next article end*/?>
    <?php else:?>

    <?php /*if no next article*/?>
    <a class='nextArticle_box' href="<?php network_site_url('/'); ?>">
        <div>この記事のトップに戻る</div>
    </a>
    <?php endif; ?>
    <?php /*if no next article end*/?>


    <?php /*prev article start*/?>
    <?php if ($prevpost):?>
    <a class='nextArticle_box nextArticle_box--prev' href='<?php echo get_permalink($prevpost->ID); ?>'>
        <?php echo get_the_post_thumbnail($prevpost->ID, 'next_thumb_onSingle'); ?>
        <div class='nextArticle_box_innerText'>
            <?php echo get_the_title($prevpost->ID); ?>
        </div>
    </a>
    <?php /*prev article end*/?>

    <?php else:?>

    <?php /*if no prev article*/?>
    <a class='nextArticle_box' href="<?php network_site_url('/'); ?>">
        <div>この記事のトップに戻る</div>
    </a>
    <?php /*if no prev article end*/?>
    <?php endif; ?>
</div>
<?php endif; ?>