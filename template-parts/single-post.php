
<div class="single-container">
    <p
    <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        $caption = wp_get_attachment_caption( get_post_thumbnail_id( $post->ID ) );
        echo 'style="background: url('.$image[0].'); color: white"';
        endif; ?>><?php echo substr($post->post_title, 0, 24).'...'; ?>
        <br/>
        <small><i class="fa fa-comments" aria-hidden="true"></i> <?php echo get_comments_number( $post->ID ); ?> comments</small>
    </p>
    <div>
        <p><?php echo substr(wp_strip_all_tags( $post->post_content ), 0, 96); ?></p>

        <div class="post-divider"></div>

        <div class="row bottom">
            <p class="date"><?php echo (new DateTime($post->post_date))->format('D, d M Y'); ?></p>
            <p class="date"><?php echo get_the_author_meta('display_name', $post->post_author); ?></p>
        </div>
        <p class="button"><a href="<?php echo $post->guid; ?>">More...</a></p>
    </div>
</div>
