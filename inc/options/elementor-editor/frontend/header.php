<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<li style="display: list-item;">
    <div class="notice lian-notice"><?php echo __( 'To set a custom Footer, navigate to <b>Lian > Settings > Header.</b>', 'lian' ); ?></div>
    <div class="elementor-childs">
        <?php 
            $args = array(
                'post_type'=> 'lian_header',
                'order'    => 'DESC',
                'posts_per_page' => -1
            );

            $the_query = new WP_Query( $args );
            if($the_query->have_posts() ) :
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
                    echo '<div id="post'.get_the_ID().'">';
                    echo '<img src="'.LIAN_ASSETS_URI.'/img/header.png">';
                    echo '<span>'. get_the_title(). '</span>';
                    echo '<a href="'.esc_url(get_admin_url()).'post.php?post='.get_the_ID().'&action=elementor"><i class="lian-font icon-edit"></i></a>';
                    echo '<a onclick="lian_remove_post('.get_the_ID().');"><i class="lian-font icon-trash"></i></a>';
                    echo '</div>';
                endwhile;
                wp_reset_postdata();
            endif;
        ?>
        <div class="new">
            <span>
            <i class="dashicons dashicons-plus-alt2"></i><input name="lian_post_title" placeholder="<?php echo __( 'Write a Title...', 'lian' ); ?>"><a onclick="lian_create_new_post(this,'lian_header');">+ <?php echo __( 'Create New Header', 'lian' ); ?></a></span>
        </div>
    </div>
</li>