<?php get_header() ?>

<main class="blog-page">



    <?php

    if (have_posts()) {
        $firstPost = FALSE;
        while (have_posts() && $firstPost == FALSE) {
            $firstPost = TRUE;
            the_post(); ?>
            <section id="latest-post-image"></section>
            <section id="latest-post-image-blur"></section>
            <section id="latest-post">

                <div class="post-container">
                    <div class="post-image">

                        <div class="post-info">
                            <div class="post-meta">
                                <time datetime="<?php the_time('d.m.Y, H:M') ?>"><?php the_time('d.m.Y, H:m') ?></time>
                                <ul class="categories">
                                <?php $categories = get_the_category(); // getting all category objects of the current post
                                foreach ($categories as $category) {
                                    echo '<li><a class="category-white" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                                } ?>
                                </ul>
                            </div>
                            <h1 class="post-title">
                                <?php the_title() ?>
                            </h1>
                        </div>
                    </div>
                    <div class="post-text">
                        <p>
                            <?= get_the_excerpt(); ?>
                        </p>

                        <a href="<?php the_permalink() ?>" class="red-button">Ansehen</a>



                    </div>
                </div>





                <style>
                    section#latest-post-image {
                        background: linear-gradient(to bottom, rgba(23, 23, 23, 0.2) 0%, rgba(23, 23, 23, 0.999) 50%, var(--color-background-black) 100%), url(<?= get_the_post_thumbnail_url(get_the_ID(), 'high') ?>);
                        background-repeat: no-repeat;
                        background-size: cover;
                    }

                    section#latest-post-image-blur {
                        backdrop-filter: blur(8px);
                    }

                    div.post-image {
                        background: linear-gradient(270deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0.5) 100%), url(<?= get_the_post_thumbnail_url(get_the_ID(), 'high') ?>);
                        background-repeat: no-repeat;
                        background-size: cover;
                    }
                </style>

            </section>

    <?php
        }
    }

    ?>



</main>

<?php get_footer() ?>