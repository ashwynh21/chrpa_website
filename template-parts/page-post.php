<?php
?>

<!--
Here the content we display needs to be much larger than before
-->
<div class="post-page">
    <p><?php echo $post->post_title; ?></p>
    <?php echo $post->post_content; ?>
    <p><?php echo (new DateTime($post->post_date))->format('D, d M Y'); ?></p>

    <?php
    if(comments_open($post->ID)) {
    ?>
    <div class="comments">
        <div class="title-news" style="margin-left: 0;">
            <p>Comments</p>
            <div></div>
        </div>
        <?php
        $comments = get_comments(array(
            'post_id' => $post->ID,
            'after' => '1 week ago'
        ));

        foreach($comments as $comment) {
            ?>
            <div class="comment">
                <div class="row">
                    <p><?php echo $comment->comment_author; ?></p>
                    <p><?php echo (new DateTime($comment->comment_date))->format('D, d M Y'); ?></p>
                </div>
                <p><?php echo $comment->comment_content; ?></p>
                <div></div>
            </div>
            <?php
        }

        comment_form();
        ?>
    </div>
    <?php
    } else {
    ?>
        <div class="comments"></div>
    <?php
    }
    ?>
</div>
