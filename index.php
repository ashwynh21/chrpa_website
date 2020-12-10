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

/*
 * Here we shoudl check if the id field is set in the page query string so that we can display a post
 * */

/*
 * so with the post set we just need to get the page that was selected as per the query string and
 * display it;
 * */
$post = get_post();
set_query_var('post', $post);

get_template_part('template-parts/page-post');

/*
 * We also need to check if the page_id is set so that we can collect the posts whose tag name is the same as the page
 * name...
 * */

get_footer();