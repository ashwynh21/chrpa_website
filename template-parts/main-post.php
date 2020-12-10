<?php
$args = array(
    'posts_per_page' => 1,
    'tax_query'      => array(
        array(
            'taxonomy'  => 'post_tag',
            'field'     => 'slug',
            'terms'     => sanitize_title( 'Main' )
        )
    )
);

$posts = get_posts( $args );
?>

    <!--
    Down here we will need to add the carousel of the page
    -->
    <div class="carousel">
        <?php
        $args = array(
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'orderby' => 'post_date',
            'order' => 'desc',
            'posts_per_page' => '30',
            'post_status'    => 'inherit'
        );

        $loop = new WP_Query( $args );

        while ( $loop->have_posts() ) : $loop->the_post();

            $image = wp_get_attachment_image_src( get_the_ID(), 'full', false );
            $caption = wp_get_attachment_caption( get_the_ID());

            if($caption === 'wallpaper') {
                ?>
                <div>
                    <img src="<?php echo $image[0]; ?>" />
                </div>
                <?php
            }
        endwhile;
        ?>
    </div>
    <script>
        $('.carousel').slick({
            infinite: true,
            dots: false,
            centerMode: true,
            arrows: false
        });

        setInterval(() => {
            $('.carousel').slick('slickNext');
        }, 4800)
    </script>

<?php if( count($posts) > 0 ) {
    $post = $posts[0];
    ?>
<div class="main-post row justify-center h-full">
    <div class="flex-2 image-home-container">
        <?php if (has_post_thumbnail( $post->ID ) ): ?>
            <?php
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
            $caption = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ) );
            ?>
            <div class="image-home">
                <p><?php echo substr($caption, 0, 32); ?></p>
                <img id="custom-bg" src="<?php echo $image[0]; ?>"/>
            </div>
        <?php endif; ?>
    </div>
    <div class="flex-3 column h-full justify-center">
        <p><?php echo $post->post_title; ?></p>
        <p><?php echo substr(wp_strip_all_tags( $post->post_content ), 0, 224).'...'; ?></p>

        <div></div>
        <p class="publish">Published: <?php echo (new DateTime($post->post_date))->format('D, d M Y'); ?></p>

        <p class="button"><a href="<?php echo $post->guid; ?>">Read More...</a></p>
    </div>
</div>
<?php } ?>