<footer>

    <!---------- FOOTER NAVIGATION ---------->
    <div class="footer-nav">
        <h4>
            <?= bloginfo('name') ?>
        </h4>

        <nav>
            <?php

            wp_nav_menu(
                [
                    'theme_location' => 'footer',
                    'container' => 'ul',
                    'container_class' => 'footer-nav'
                ]
            );

            ?>
        </nav>
    </div>


    <!---------- SOCIAL MEDIA NAVIGATION ---------->
    <div class="social-media">
        <h4>
            Finde uns
        </h4>

        <nav>
            <?php

            wp_nav_menu(
                [
                    'theme_location' => 'social',
                    'container' => 'ul',
                    'container_class' => 'social-nav'
                ]
            );

            ?>
        </nav>
    </div>


    <!---------- ADRESS ---------->
    <div class="address">
        <h4>
            Adressen
        </h4>
        <address>
            Cheers Mate!
            <br>
            Bahnhofstrasse 6
            <br>
            3000 Bern
        </address>
        <a class="contact" href="tel:+41313336688">+41 31 333 66 88</a>
        <a class="contact" href="mailto:info@cheersmate.ch">info@cheersmate.ch</a>
    </div>





</footer>

<?php wp_footer() ?>


</body>

</html>