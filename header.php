<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
    <title><?= get_the_title() ?> | <?php bloginfo('name') ?></title>
</head>

<body>
    <header>
        <div class="web-title">
            <a href="<?= home_url() ?>"><?php bloginfo('name') ?></a>

            <button onclick="toggleMenu()" class="burger-toggle">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <nav>

            <?php

            wp_nav_menu(
                [
                    'theme_location' => 'header',
                    'container' => 'ul',
                    'container_class' => 'main-nav'
                ]
            );

            ?>

        </nav>


        <a href="#" class="button">
            Jetzt herunterladen
        </a>
    </header>
</body>