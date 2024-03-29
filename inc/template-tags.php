<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package lian
 */

if ( ! function_exists( 'lian_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function lian_posted_on() {

		/** Check Setting for Archive **/
		if('post' === get_post_type() && !is_singular() && lian_options('lian_blog_archive_postdate') !== "1"){
			return;
		}

		/** Check Setting for Archive **/
		if('post' === get_post_type() && is_singular() && lian_options('lian_blog_single_postdate') !== "1"){
			return;
		}

		/** Check Setting for Portfolio Archive **/
		if('portfolio' === get_post_type() && !is_singular() && lian_options('lian_portfolio_archive_postdate') !== "1"){
			return;
		}

		/** Check Setting for Portfolio Signle **/
		if('portfolio' === get_post_type() && is_singular() && lian_options('lian_portfolio_single_postdate') !== "1"){
			return;
		}

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="updated" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted at %s', 'Post Date', 'lian' ), $time_string
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'lian_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function lian_posted_by() {

		/** Check Setting for Archive **/
		if('post' === get_post_type() && !is_singular() && lian_options('lian_blog_archive_author') !== "1"){
			return;
		}

		/** Check Setting for Single **/
		if('post' === get_post_type() && is_singular() && lian_options('lian_blog_single_author') !== "1"){
			return; 
		}

		/** Check Setting for Portfolio Archive **/
		if('portfolio' === get_post_type() && !is_singular() && lian_options('lian_portfolio_archive_author') !== "1"){
			return;
		}

		/** Check Setting for Portfolio Signle **/
		if('portfolio' === get_post_type() && is_singular() && lian_options('lian_portfolio_single_author') !== "1"){
			return;
		}

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'lian' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'lian_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function lian_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			/* Read More */
			$read_more_text = (!empty(lian_options('lian_blog_archive_readmore_text')) ? lian_options('lian_blog_archive_readmore_text'): __( 'Read More »', 'lian' ) );
			if(! is_single() && lian_options('lian_blog_archive_readmore') === "1"){
				printf( '<a href="%s">' . $read_more_text . '</a>', esc_url(get_permalink()) );
			}

			$categories_list = get_the_category_list( __( ', ', 'lian' ) );
			if ( $categories_list && ((is_singular() && lian_options('lian_blog_single_categories') === "1") || ( ! is_singular() && lian_options('lian_blog_archive_categories') === "1"))) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . __( 'Categoires: %1$s', 'lian' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'lian' ) );
			if ( $tags_list && ((is_singular() && lian_options('lian_blog_single_tags') === "1") || ( ! is_singular() && lian_options('lian_blog_archive_tags') === "1"))) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . __( 'Tags: %1$s', 'lian' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}elseif ('portfolio' === get_post_type()) {
			
			/* Read More */
			$read_more_text = (!empty(lian_options('lian_portfolio_archive_readmore_text')) ? lian_options('lian_portfolio_archive_readmore_text'): __( 'See Details »', 'lian' ) );
			if(! is_single() && lian_options('lian_portfolio_archive_readmore') === "1"){
				printf( '<a href="%s">' . $read_more_text . '</a>', esc_url(get_permalink()) );
			}

			$categories_list = get_the_term_list(get_the_ID(), 'protfolio_category', '', __( ', ', 'lian' ));
			if ( $categories_list && ((is_singular() && lian_options('lian_portfolio_single_categories') === "1") || ( ! is_singular() && lian_options('lian_portfolio_archive_categories') === "1"))) {
				printf( '<span class="cat-links">' . __( 'Categoires: %1$s', 'lian' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
			
			$tags_list = get_the_term_list(get_the_ID(), 'protfolio_tag', '', __( ', ', 'lian' ));
			if ( $tags_list && ((is_singular() && lian_options('lian_portfolio_single_tags') === "1") || ( ! is_singular() && lian_options('lian_portfolio_archive_tags') === "1"))) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . __( 'Tags: %1$s', 'lian' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

		}
	}
endif;

if ( ! function_exists( 'lian_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function lian_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		/** Check Setting for Blog Archive **/
		if('post' === get_post_type() && !is_singular() && lian_options('lian_blog_archive_thumb') !== "1"){
			return;
		}

		/** Check Setting for Blog Signle **/
		if('post' === get_post_type() && is_singular() && lian_options('lian_blog_single_thumb') !== "1"){
			return;
		}

		/** Check Setting for Portfolio Archive **/
		if('portfolio' === get_post_type() && !is_singular() && lian_options('lian_portfolio_archive_thumb') !== "1"){
			return;
		}

		/** Check Setting for Portfolio Signle **/
		if('portfolio' === get_post_type() && is_singular() && lian_options('lian_portfolio_single_thumb') !== "1"){
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php esc_url(the_permalink()); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
