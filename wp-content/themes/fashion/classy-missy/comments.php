<?php
if ( post_password_required() ) {
	return;
}?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>

	    <h3><?php comments_number(esc_html__('No Comments','classy-missy'), esc_html__('Comment ( 1 )','classy-missy'), esc_html__('Comments ( % )','classy-missy') );?></h3>

		<?php the_comments_navigation(); ?>

        <ul class="commentlist">
     		<?php wp_list_comments( array( 'callback' => 'classymissy_comment_style' ) ); ?>
        </ul>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="nocomments"><?php esc_html_e( 'Comments are closed.','classy-missy'); ?></p>
    <?php endif;?>    
	
    <?php
	$comment = "<div class='column dt-sc-one-half first'><textarea id='comment' name='comment' cols='5' rows='3' placeholder='".esc_html__("Comment",'classy-missy')."' ></textarea></div>";
	$author = "<div class='column dt-sc-one-half'><p><input id='author' name='author' type='text' placeholder='".esc_html__("Name",'classy-missy')."' required /></p>";
	$email = "<p> <input id='email' name='email' type='text' placeholder='".esc_html__("Email",'classy-missy')."' required /> </p></div>";
	
	$comments_args = array(
		'title_reply' 			=> 	esc_html__( 'Give a Reply','classy-missy' ),
		'fields'				=> 	array('author' => $author,'email' => $email),
		'comment_field'			=> 	$comment,
		'comment_notes_before'	=>	'',
		'comment_notes_after'	=>	'',
		'label_submit'			=>	esc_html__('Comment','classy-missy'));

	comment_form($comments_args);?>

</div><!-- .comments-area -->