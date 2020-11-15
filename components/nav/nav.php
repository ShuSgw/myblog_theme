<nav id="sidebar">
    <div class="sidebar-header pl-1 pt-2">
        <h3>カテゴリー</h3>
    </div>
    <?php
        wp_nav_menu([
            'theme_location' => 'main-menu',
            'menu_class' => 'list-unstyled components',
            'add_li_class' => 'pt-2 pb-2 pl-3',
        ]);
    ?>
</nav>
<div class="sidebar-header pl-1 pt-2">
    <h3>広告</h3>
</div>
<div class='ad_sample'>
</div>