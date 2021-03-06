<?php
/**
 * Custom post type archive template
 *
 * This is the custom post type archive template. If you edit the
 * custom post type name, you've got to change the name of this
 * template to reflect that name change. For Example, if your custom
 * post type is called "register_post_type( 'bookmarks')", then your
 * template name should be archive-bookmarks.php.
 *
 * For more info: http://codex.wordpress.org/Post_Type_Templates
 */

get_header();

?>
<main id="main" class="content-wrap cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
	<h1 class="archive-title"><?php post_type_archive_title(); ?></h1>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) : the_post();

			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-layout cf' ); ?> role="article">
				<header class="article-header">
					<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
					<p class="byline vcard">
						<?php
						/* translators: 1: the post published time in Y-m-j format, 2: the post published time, 3: the author name and URL link */
						printf( __( 'Posted <time class="updated" datetime="%1$s" itemprop="datePublished">%2$s</time> by <span class="author">%3$s</span>', 'bonestheme' ), // wpcs: XSS ok.
							esc_attr( get_the_time( 'Y-m-j' ) ),
							esc_html( get_the_time( __( 'F jS, Y', 'bonestheme' ) ) ),
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
						);
						?>
					</p>
				</header>

				<section class="entry-content cf">
					<?php the_excerpt(); ?>
				</section>
			</article>
			<?php

		endwhile;

		bones_page_navi();

	else :

		?>
		<article id="post-not-found" class="article-layout hentry cf">
			<header class="article-header">
				<h1><?php esc_html_e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
			</header>

			<section class="entry-content">
				<p><?php esc_html_e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
			</section>
		</article>
		<?php
	endif;

	get_sidebar();

	?>
</main>
<?php

get_footer();
