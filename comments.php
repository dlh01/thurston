<?php
/**
 * @package WordPress
 * @subpackage thurston
 */

if ( ! function_exists( 'thurston_comment' ) ) :
/**
 * Template for comments and pingbacks.
 */
function thurston_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard comment-meta commentmetadata">
					<?php printf( __( '%s', 'thurston' ), sprintf( '<cite class="fn">%s</cite>, ', get_comment_author_link() ) ); ?>
                    <time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s', 'thurston' ), get_comment_date( 'g:i a j F Y' ) ); ?>
					</time>				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'thurston' ); ?></em>
					<br />
				<?php endif; ?>

			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="comment-link reply">
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">Link</a>
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                <?php edit_comment_link( __( 'Edit', 'thurston' ), ' | ' ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'thurston' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'thurston'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif; // ends check for thurston_comment()

?>

	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<div class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'thurston' ); ?></div>
	</div><!-- .comments -->
	<?php return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 id="comments-title">Discussion</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="section-heading"><?php _e( 'Comment navigation', 'thurston' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older comments', 'thurston' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer comments &rarr;', 'thurston' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'thurston_comment' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="section-heading"><?php _e( 'Comment navigation', 'thurston' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older comments', 'thurston' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer comments &rarr;', 'thurston' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php else : // this is displayed if there are no comments so far ?>

		<?php if ( comments_open() ) : // If comments are open, but there are no comments ?>

		<?php else : // or, if we don't have comments:

			/* If there are no comments and comments are closed,
			 * let's leave a little note, shall we?
			 * But only on posts! We don't want the note on pages.
			 */
			if ( ! comments_open() && ! is_page() ) :
			?>
			<p class="nocomments"><?php _e( 'Comments are closed.', 'thurston' ); ?></p>
			<?php endif; // end ! comments_open() && ! is_page() ?>


		<?php endif; ?>

	<?php endif; ?>

    <?php comment_form(array('title_reply'=>'Leave a reply')); ?>

</div><!-- #comments -->
