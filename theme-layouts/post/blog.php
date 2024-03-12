<?php
$show_expert = false;
if('post' === get_post_type()){
	if(lian_options('lian_blog_archive_expert') === "1"){
		$show_expert = true;
	}
	$expret_long = !empty(lian_options('lian_blog_archive_expert_long')) ? lian_options('lian_blog_archive_expert_long') : 55;
}elseif ('portfolio' === get_post_type()) {
	if(lian_options('lian_portfolio_archive_expert') === "1"){
		$show_expert = true;
	}
	$expret_long = !empty(lian_options('lian_portfolio_archive_expert_long')) ? lian_options('lian_portfolio_archive_expert_long') : 55;
}

$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$posts = new WP_Query( array(
    'paged'           => $paged,
    'posts_per_page'  => get_option( 'posts_per_page' ),
    'post_type' => 'post',
) );


if ( $posts->have_posts() ) :
  while ( $posts->have_posts() ) : $posts->the_post();
  ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<?php lian_post_thumbnail(); ?>
  	<header class="entry-header">
  		<?php
               the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
               if ( 'post' === get_post_type() ) : ?>
  			<div class="entry-meta">
  				<?php 
                         lian_posted_on();
                         lian_posted_by();
                    ?>
  			</div>
  		<?php endif; ?>
  	</header>
     
     <?php if($show_expert): ?>
  	<div class="entry-content">
  		<?php echo wp_trim_words( get_the_content(), $expret_long, ' ...' ); ?>
  	</div>
     <?php endif; ?>

  	<footer class="entry-footer">
  		<?php lian_entry_footer(); ?>
  	</footer>
  </article>

  <?php
  endwhile;
endif;

$total = $posts->max_num_pages;
// Only paginate if we have more than one page
if ( $total > 1 )  {
     // Get the current page
     if ( !$current_page = get_query_var('paged') )
          $current_page = 1;

     $format = empty( get_option('permalink_structure') ) ? '&page=%#%' : 'page/%#%/';
     echo paginate_links(array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => $format,
          'current' => $current_page,
          'total' => $total,
          'mid_size' => 4,
          'type' => 'list'
     ));
}
