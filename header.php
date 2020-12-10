<?php
/**
 * The header file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage CHRPA
 */
?>
<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://kenwheeler.github.io/slick/slick/slick.css" rel="stylesheet"/>
    <link href="https://kenwheeler.github.io/slick/slick/slick-theme.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    wp_body_open();
    ?>

    <!--
    So here we show the top bar
    -->
    <div class="row topbar">
        <p><?php echo strtoupper(get_bloginfo('name')); ?></p>

        <p><a href="https://www.chrpa.org/index.php/faqs/lodge-a-complaint/">LODGE A COMPLAINT</a></p>

        <div class="floating-menu">
            <div></div>
            <div></div>
            <div></div>
        </div>

        <div id="menu" style="right: -100%;">
            <div id="close">
                <div></div>
                <div></div>
            </div>

            <div class="column pages">
                <?php
                $pages = wp_list_pages();
                ?>
            </div>
            <div class="column menus">
                <?php
                $items = get_nav_menu_locations();
                ?>
            </div>
        </div>
        <script>
            const open = (event) => {
                const menu = document.getElementById('menu');
                menu.setAttribute('style', 'right: -0%;');
            };
            const close = (event) => {
                const menu = document.getElementById('menu');
                menu.setAttribute('style', 'right: -100%;');
            };

            const cross = document.getElementById('close');
            cross.addEventListener('click', close);
            const float = document.getElementsByClassName('floating-menu')[0];
            float.addEventListener('click', open);
        </script>
    </div>
    <!--
    Then we show the content banner below it
    -->
    <div class="row banner">
        <div class="row">
            <p class="h5">We exist to promote and protect human rights for all and ensure equitable access to public services and the existence of a leadership that is transparent in its activities and accountable to the people it represents and serves – working through partnerships</p>
            <div class="bar"></div>
        </div>
        <div>
            <?php chrpa_site_logo(); ?>
        </div>
        <div class="centered">
            <div class="row quicklinks">
                <?php if(count(chrpa_get_nav_menu_items_by_location('contact')) > 0) { ?>
                <div class="column contact">
                    <p>Toll Free: </p>
                    <p>
                        <a href="<?php echo chrpa_get_nav_menu_items_by_location('contact')[0]->url; ?>"><?php echo chrpa_get_nav_menu_items_by_location('contact')[0]->title; ?></a>
                    </p>
                </div>
                <div class="bar"></div>
                <?php } ?>
                <div class="column contact">
                    <p>Mbabane, Eswatini</p>
                </div>
                <div class="bar"></div>
                <div class="column contact">
                    <p>24°C / 75°F</p>
                </div>
            </div>
            <p class="h5">To be a relevant and effective commission in a just society in which the principles of human rights and good governance are observed, practiced and preserved</p>
        </div>
    </div>
    <hr/>
    <div class="menu">
        <?php
        foreach (get_pages(array(
            'post_type' => 'page',
            'parent' => 0,
            'sort_column' => 'post_title'
        )) as $page) { ?>
            <!--
            Here we need the menus to work with the pages so that when the user creates a menu and they give the
            menu the same name as the page, the menu should show on this page display...
            -->
            <?php
                $menu = wp_get_nav_menu_items($page->post_name, array(
                    "locations" => ["page"],
                ));
            ?>

            <div class="column menu-item">
                <div></div>
                <div class="menu-text">
                    <a href="<?php echo $page->guid?>"><?php echo strtoupper($page->post_title); ?></a>
                    <?php
                    if($menu) {
                    ?>
                    <img src="./wp-content/themes/CHRPA/assets/icons/down.svg"/>
                    <?php } ?>
                </div>

                <!--
                So here we add a div to support the menu drop that will show
                -->
                <?php
                if($menu) {
                ?>
                <div class="menu-item-drop">
                        <?php
                        foreach ($menu as $item) {
                        ?>
                            <p><a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a></p>
                        <?php
                        }
                        ?>
                </div>
                <?php
                }
                ?>
            </div>
        <?php } ?>
        <?php get_search_form(); ?>
    </div>

