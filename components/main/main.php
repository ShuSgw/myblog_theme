<main class='mt-5 mb-5'>
    <?php
        if (is_single()) {
            // ブログページ
            get_template_part('./components/article_loop/single_article_loop');
        } else {
            // フロント
            get_template_part('./components/article_loop/article_loop');
            get_template_part('./components/pageNation/pageNation');
        }
    ?>
</main>