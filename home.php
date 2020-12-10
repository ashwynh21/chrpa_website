<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage CHRPA
 */

get_header();
?>

<!--
The single main post will go here
-->
<?php get_template_part('template-parts/main-post') ?>

<!--
Here we need to put the post information...
-->
<?php get_template_part('template-parts/home-posts') ?>
<!--
Then we add in the members profiles here
-->
<?php get_template_part('template-parts/members') ?>

<!--
And finally we add the social media platforms here
-->
<?php get_template_part('template-parts/social') ?>

<!--
Here we we are going to have the contact us form...
-->
<?php get_template_part('template-parts/contact-form'); ?>

<?php get_footer(); ?>