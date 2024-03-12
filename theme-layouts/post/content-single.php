<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lian
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	    lian_post_thumbnail(); 
	?>
	<header class="entry-header">
		<?php

			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

			<div class="entry-meta">
				<?php
					lian_posted_on();
					lian_posted_by();
				?>
			</div>
	</header>
	
	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<footer class="entry-footer">
		<?php lian_entry_footer(); ?>
	</footer>
</article>
