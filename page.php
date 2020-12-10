<?php

get_header();

$title = get_post()->post_title;
?>
<div class="column centered content">
    <div class="title-news">
        <p><?php echo $title; ?></p>
        <div></div>
    </div>

    <div class="content page-content">
        <?php the_content(); ?>
    </div>
    <?php
    $page = get_post()->post_name;
    $posts = get_posts(array(
        'tag' => $page
    ));
    if ($posts) : ?>
    <div id="carousel2">
        <!--
        Then here is where we insert the row posts so we need a reference to these posts...
        -->
        <div>
            <?php

                foreach ($posts as $post) {
                    set_query_var('post', $post);
                    get_template_part('template-parts/single-post');
                }
            ?>
        </div>

        <div class="controls">
            <div id="left"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
            <div id="right"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
        </div>
    </div>
    <?php
    endif;
    ?>
    <script>
        const carousel = document.querySelector('#carousel2').children[0];

        const left = document.querySelector('#left');
        const right = document.querySelector('#right');

        let position = -144;
        carousel.setAttribute('style', `left: ${position}px`);

        left.addEventListener('click', (event) => {
            position += 100;

            carousel.setAttribute('style', `left: ${position}px`);
        });
        right.addEventListener('click', (event) => {
            position -= 100;

            carousel.setAttribute('style', `left: ${position}px`);
        });
    </script>
</div>
<?php
get_footer();
?>