<?php
?>
<div class="footer-container">
    <div class="footer row">
        <div class="column pages">
            <?php
            $pages = wp_list_pages();
            ?>
        </div>
        <div class="column authors">
            <p>Authors</p>
            <?php
            $authors = wp_list_authors();

            echo $authors;
            ?>
        </div>
        <div class="column posts">
            <p>Posts</p>
            <div>
                <?php
                $posts = (new WP_Query(array('post_type' => 'post')))->posts;

                foreach ($posts as $post) {
                ?>
                    <p><a href="<?php echo $post->guid; ?>"><?php echo $post->post_title;?></a></p>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="textwidget" style="align-self: flex-end; justify-self: flex-end">
            <div class="textwidget"> <!-- <img src="images/footer-logo2.png" alt=""> -->
                <address>
                    <ul>
                        <li> <i class="fa fa-university"></i> <strong>Physical Address:</strong> Mbabane Office Park, Sibekelo Building    </li>
                        <li> <i class="fa fa-envelope"></i> <strong>Email:</strong> support@chrpa.org <br>
                            info@chrpa.org  </li>
                        <li> <i class="fa fa-phone"></i> <strong>Call us:</strong>  (+268) 2404 9829 <small>/</small> 2404 7625 <small>/</small> 2404 9152</li>
                    </ul>
                </address>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <?php chrpa_site_logo(); ?>
        <p>Commission On Human Rights &amp; Public Administration / Integrity | &copy;copyright <?php echo (new DateTime())->format('Y'); ?></p>
    </div>
</div>
