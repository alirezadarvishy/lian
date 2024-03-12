<?php
$post_id = intval(lian_options('lian_cs_footer_name'));
$slug = get_post_field( 'post_name', $post_id );
$args = array(
    'name'        => $slug,
    'post_type'   => 'lian_footer',
    'post_status' => 'publish',
    'numberposts' => 1
);
$posts = get_posts($args);
foreach ( $posts as $post ) {
    $classes = array('lian-footer footer-builder-wrapper');
    $classes[] = $post->post_name;
    echo '<div id="lian-footer" class="'.esc_attr(implode(' ', $classes)).'">';
    echo '<div class="lian-footer-inner">';
    echo apply_filters('the_content', $post->post_content);
    echo '</div>';
    echo '</div>';
}