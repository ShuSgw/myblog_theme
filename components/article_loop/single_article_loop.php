<main class='single_main'>
    <div class="container-fluid">
        <div class='single_main_contents'>
            <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
            <h1 class='pb-4'><?php the_title(); ?></h1>
            <div class='single_thumb'>
                <?php the_post_thumbnail('large'); ?>
            </div>
            <article class="entry mb-5">
                <?php the_content(); ?>
            </article>
            <?php get_template_part('./components/article_loop/nextArticle'); ?>
            <?php if (comments_open() || get_comments_number()) :?>
            <?php comments_template(); ?>
            <?php endif; ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</main>