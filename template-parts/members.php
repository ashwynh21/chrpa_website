<?php
?>
<div>
    <div class="title-news">
        <p>The Commissioners</p>
    </div>
    <div class="profiles">
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
            $caption = wp_get_attachment_caption( get_the_ID() );
            $description = get_post( get_the_ID() );

            if($caption === 'member') {
                ?>
                <div>
                    <div>
                        <img src="<?php echo $image[0]; ?>" />
                    </div>
                    <p><?php echo $description->post_content; ?>...</p>
                </div>
                <?php
            }
        endwhile;
        ?>
    </div>

</div>