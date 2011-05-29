<?php
/**
 * @package WordPress
 * @subpackage thurston
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Not found', 'thurston' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but we can&rsquo;t find the page you were looking for. Perhaps searching, or one of the links below, can help.', 'thurston' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts', "title=Recent posts" ); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Top categories', 'thurston' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 'TRUE', 'title_li' => '', 'number' => '10', 'hierarchical' => '0' ) ); ?>
						</ul>

					</div>
					<?php the_widget( 'WP_Widget_Archives', 'dropdown=0&title=Monthly archives', "after_title=</h2>" ); ?>

					<?php the_widget( 'WP_Widget_Pages', "title=Site map" ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>
