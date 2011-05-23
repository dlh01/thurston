<?php
/**
 * @package WordPress
 * @subpackage Toolbox
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php
				printf( __( '<span class="author vcard">%1$s</span>, <time class="entry-date" datetime="%2$s" pubdate>%3$s %4$s</time>', 'toolbox' ),
					get_the_author(),
					get_the_date( 'c' ),
                    get_the_time(),
					get_the_date()
				);
			?>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'toolbox' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
            $utility_text = __( 'Categorized %1$s | <a href="%3$s" title="Permalink to %4$s" rel="bookmark">Permalink</a>', 'toolbox' );
			printf(
				$utility_text,
				get_the_category_list( ', ' ),
				$tag_list,
				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'toolbox' ), '| <span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
