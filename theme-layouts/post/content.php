<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lian
 */
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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php lian_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<div class="entry-meta">
			<?php
				lian_posted_on();
				lian_posted_by();
			?>
		</div>
	</header>

	<?php if($show_expert && !empty(get_post_field('post_content', $post->id))): ?>
	<div class="entry-content">
		<?php echo wp_trim_words( get_the_content(), $expret_long, ' ...' ); ?>
	</div>
	<?php endif; ?>

	<footer class="entry-footer">
		<?php lian_entry_footer(); ?>
	</footer>
</article>