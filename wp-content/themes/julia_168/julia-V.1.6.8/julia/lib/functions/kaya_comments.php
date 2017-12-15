<?php
if ( ! function_exists( 'julia_kaya_comment' ) ) :
function julia_kaya_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<div class="parent">	
	<div class="avatar_img alignleft">
	  <?php echo get_avatar( $comment, 46 ); ?>
	 		</div>
		<div id="comment-<?php comment_ID(); ?>" class="description">
            <div class="comment-author vcard">
            	<h4>
	            	<?php printf( __( '%s <span class="says"></span>', 'julia' ), sprintf( '%s', get_comment_author_link() ) ); ?>	            	
            	</h4>
            </div>
            <div class="comment_posted_date"><?php printf( __( '%1$s at %2$s', 'julia' ), get_comment_date('M, d, y'),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'julia' ), ' ' ); ?></div>
            <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">	</a>	
			</div><!-- .comment-meta .commentmetadata --><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'julia' ); ?>
			<br />
		<?php endif; ?>
		<div class="comment-body"><?php comment_text(); ?></div>
		<?php
				/* translators: 1: date, 2: time */ ?>
			<?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'julia' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>           
                
		</div><!-- #comment-##  -->
		</div>	
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">

		<p><?php esc_html_e( 'Pingback:', 'julia' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__('(Edit)', 'julia'), ' ' ); ?></p>

	<?php 
		break;
	endswitch;
}
endif;
if ( ! function_exists( 'julia_kaya_posted_on' ) ) :
function julia_kaya_posted_on() { ?>
	<div class="postmeta">
	<div class="postmetadata">
	<span class="postmetadate"><?php echo get_the_date();?></span>
	<span class="postemetain"><?php esc_html_e('Posted In','julia'); ?>: <?php the_category(', ') ?> </span>
	<span class="postmetawriter"><?php  esc_html_e( 'By ' ,'julia'); the_author_posts_link(); ?>  </span>
	<span class="comments"> <?php comments_popup_link( esc_html__( 'Leave a comment', 'julia' ), esc_html__( '1 Comment', 'julia' ), esc_html__( '% Comments', 'julia' ) ); ?> </span>
	<span class="editlink"><?php edit_post_link( esc_html__( 'Edit', 'julia' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' );?></span>
	</div>
	</div>
<?php
}
endif;
if ( ! function_exists( 'julia_kaya_comment' ) ) :
function julia_kaya_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :		case '' :

	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 46 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'julia' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->

		<?php if ( $comment->comment_approved == '0' ) : ?>
			<?php esc_html_e( 'Your comment is awaiting moderation.', 'julia' ); ?>
			<br />

		<?php endif; ?>
		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				printf( __( '%1$s at %2$s', 'julia' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'julia' ), ' ' );	?>
		</div><!-- .comment-meta .commentmetadata -->
		<div class="comment-body"><?php comment_text(); ?></div>
		<div class="reply">

			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );  ?>
		</div><!-- .reply -->

	</div><!-- #comment-##  -->
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'julia' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__('(Edit)', 'julia'), ' ' ); ?></p>
		<?php 
	break;
	endswitch;

}
endif;

if ( ! function_exists( 'julia_kaya_posted_in' ) ) :
	function julia_kaya_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'julia' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'julia' );
		} else {
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'julia' );
		}

		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
		);
	}
endif; ?>