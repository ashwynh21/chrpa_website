<?php

?>
<!--
Here we are going to list the posts of the home page related tags that will allow the user to view everything that
is required to be displayed on the home page..
-->
<div class="column centered content">
    <div class="title-news">
        <p>Be Updated With Our News Feed</p>
        <div></div>
    </div>

    <div id="carousel">
        <!--
        Then here is where we insert the row posts so we need a reference to these posts...
        -->
        <div>
            <?php
            if (have_posts()) {
                $posts = (new WP_Query(array('post_type' => 'post')))->posts;

                foreach ($posts as $post) {
                    set_query_var('post', $post);
                    get_template_part('template-parts/single-post');
                }
            }
            ?>
        </div>

        <div class="controls">
            <div id="left"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            <div id="right"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
        </div>
    </div>
    <script>
        const carousel = document.querySelector('#carousel').children[0];

        const left = document.querySelector('#left');
        const right = document.querySelector('#right');

        let position = -0;
        carousel.setAttribute('style', `left: ${position}px`);

        left.addEventListener('click', (event) => {
            position += 200;

            carousel.setAttribute('style', `left: ${position}px`);
        });
        right.addEventListener('click', (event) => {
            position -= 200;

            carousel.setAttribute('style', `left: ${position}px`);
        });
    </script>
</div>
