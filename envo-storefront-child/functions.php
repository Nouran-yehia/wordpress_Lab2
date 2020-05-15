<?php

if (!function_exists('envo_storefront_generate_construct_footer')) :
   
    add_action('envo_storefront_generate_footer', 'envo_storefront_generate_construct_footer');

    function envo_storefront_generate_construct_footer() {
        ?>
        <div class="footer-credits-text text-center">
            <?php
            printf(esc_html__('Proudly powered by %s', 'envo-storefront'), '<a href="' . esc_url(__('https://wordpress.org/', 'envo-storefront')) . '">' . esc_html__('Nouran M.Yehia', 'envo-storefront') . '</a>');
            ?>
        </div>
        <?php
    }

endif;

add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
        )
    );
}

function custom_excerpt( $post_excerpt ) {
    $newExcerpt = "You are viewing Noura's post".$post_excerpt;
    return $newExcerpt;
}
add_filter( 'the_excerpt', 'custom_excerpt' );

add_action('wp_head','add_custom_meta');

function add_custom_meta() {
    echo '<meta name="author" content="Nouran M.Yehia">';
}