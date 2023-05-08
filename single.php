<?php get_header() ?>

<main>
    <?php the_post() ?>
    <section id="post-hero">
        <div id="post-info">
            <time datetime="<?php the_time('d.m.Y, H:M') ?>"><?php the_time('d.m.Y, H:m') ?></time>
            <h1><?php the_title() ?></h1>
            <ul class="post-categories">
                <?php $categories = get_the_category();
                foreach ($categories as $category) {
                    echo '<li><a class="category-transparent" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                } ?>
            </ul>

            <div class="post-button-back">
                <a href="./blog" class="button">Zurück</a>
            </div>
        </div>
    </section>

    <style>
        #post-hero {
            background: linear-gradient(to bottom, rgba(23, 23, 23, 0.0) 40%, rgba(23, 23, 23, 0.999) 78%, var(--color-background-black) 90%), url(<?= get_the_post_thumbnail_url(get_the_ID(), 'high') ?>);
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <section class="post-content-container">

        <section class="post-content">
            <?php the_content() ?>
        </section>

    </section>



</main>

<?php get_footer() ?>