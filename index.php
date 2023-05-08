<?php get_header() ?>

<main class="blog-page">



    <?php

    if (have_posts()) {
        while (have_posts()) {
            the_post() ?>
            <section id="latest-post-image"></section>
            <section id="latest-post-image-blur"></section>
            <section id="latest-post">

                <div class="post-container">
                    <div class="post-image">

                        <div class="post-info">
                            <div class="post-meta">
                                <time datetime="<?php the_time('d.m.Y, H:M') ?>"><?php the_time('d.m.Y, H:m') ?></time>
                                <ul class="categories">
                                    <?php $categories = get_the_category();
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
                            <?= get_the_excerpt() ?>
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
            break;
        }
    }

    ?>

    <section id="blog">
        <section id="blog-inner-container">

            <?php

            $postCount = $wp_query->found_posts;
            $postCount /= 6;
            $postCount = ceil($postCount);

            if ($postCount <= 1) {
                $generatePagination = FALSE;
            } else {
                $generatePagination = true;
            }



            ?>


            <h1>
                Blog
            </h1>
            <div class="controls">
                <div class="category-list">
                    <ul class="categories">
                        <!-- Insert catergory list -->
                    </ul>

                </div>
                <div class="pagination">
                    <?php

                    if ($generatePagination == TRUE) {

                        for ($pages = 1; $pages <= $postCount; $pages++) {
                            echo "<button class=\"pagination-button page-$pages\" onclick=\"changePage('$pages')\">$pages</button>";
                        }
                    }

                    ?>

                </div>
            </div>
            <div class="post-container">

                <?php

                $postPage = 1;
                $postOnPage = 1;

                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        if ($postOnPage == 6) {
                            $postPage += 1;
                            $postOnPage = 1;
                        }

                ?>

                        <article class="postcard page-<?= $postPage ?>" id="post-<?= get_the_ID(); ?>">

                            <time class="postcard-time" datetime="<?php the_time('d.m.Y, H:M') ?>"><?php the_time('d.m.Y, H:m') ?></time>
                            <h2 class="post-title"><?php the_title() ?></h2>
                            <ul class="post-categories">
                                <?php $categories = get_the_category();
                                foreach ($categories as $category) {
                                    echo '<li><a class="category-transparent" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
                                } ?>
                            </ul>

                            <div class="post-button">
                                <a href="<?php the_permalink() ?>" class="red-button">Ansehen</a>
                            </div>



                        </article>
                        <style>
                            article#post-<?= get_the_ID();

                                            ?> {
                                background-image: url(<?= get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>);
                                background-repeat: no-repeat;
                                background-size: cover;
                            }
                        </style>


                <?php
                        $postOnPage += 1;
                    }
                } ?>
            </div>
            <div class="pagination">
                <!-- Insert pagination -->
            </div>
        </section>
    </section>
    <script>
        loadPagination()
    </script>





</main>


<?php get_footer() ?>