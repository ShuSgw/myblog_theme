<?php if (have_posts()): ?>
<div class='d-flex flex-wrap align-items-stretch justify-content-center'>
    <?php while (have_posts()): the_post(); ?>
    <div class="col-sm-5 mb-5">
        <a href="<?php permalink_link(); ?>"
            class="card h-100 d-flex flex-column justify-content-between align-content-between">
            <img class='card-img-top' src="<?php echo get_the_post_thumbnail_url($post->ID, 'bootsrap_thumb'); ?>"
                alt="">
            <div class="card-body d-flex flex-column justify-content-between align-content-between">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <h6 class="card-subtitle text-muted"><?php the_date(); ?></h6>
            </div>
        </a>
    </div>
    <?php endwhile; ?>
</div>
<?php else: ?>
　<h6>記事がありません</h6>
<?php endif; ?>