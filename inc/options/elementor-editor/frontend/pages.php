<?php
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<li>
    <div class="elementor-childs">
        <?php 
            $args = array(
                'post_type'=> 'page',
                'order'    => 'DESC',
                'posts_per_page' => -1
            );

            $the_query = new WP_Query( $args );
            if($the_query->have_posts() ) :
                while ( $the_query->have_posts() ) :
                    $the_query->the_post();
                    echo '<div id="post'.get_the_ID().'">';
                    echo '<img src="'.LIAN_ASSETS_URI.'/img/page.png">';
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
            <i class="dashicons dashicons-plus-alt2"></i><input name="lian_post_title" placeholder="<?php echo __( 'Write a Title...', 'lian' ); ?>"><a onclick="lian_create_new_post(this,'page');">+ <?php echo __( 'Create New Page', 'lian' ); ?></a></span>
        </div>
    </div>
</li>