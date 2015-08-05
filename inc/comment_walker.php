<?php
class comment_walker extends Walker_Comment {
	var $tree_type = 'comment';
	var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

	function __construct() { ?>

	<section class="comments-list">

		<?php }

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$GLOBALS['comment_depth'] = $depth + 2; ?>
			
			<section class="child-comments comments-list">

				<?php }

				function end_lvl( &$output, $depth = 0, $args = array() ) {
					$GLOBALS['comment_depth'] = $depth + 2; ?>

				</section>

				<?php }

				function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
					$depth++;
					$GLOBALS['comment_depth'] = $depth;
					$GLOBALS['comment'] = $comment;
					$parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); 

					if ( 'article' == $args['style'] ) {
						$tag = 'article';
						$add_below = 'comment';
					} else {
						$tag = 'article';
						$add_below = 'comment';
					} ?>

					<article <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">
						<div class="wrapper">
							<figure class="gravatar"><?php echo get_avatar( $comment, 65); ?></figure>
							<div class="comment-meta post-meta" role="complementary">
								<h2 class="comment-author">
									<a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
								</h2>
								<div class="comment-content post-content" itemprop="text">
									<?php comment_text() ?>
								</div>
							</div>
							<div class="commentfooter">
								<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], "reply_text" => "<i class='material-icons'>&#xE15E;</i>"))) ?>
								<time class="comment-meta-item" datetime="<?php comment_date('Y-m-d') ?>T<?php comment_time('H:iP') ?>" itemprop="datePublished"><?php comment_date('d M Y') ?> - <a href="#comment-<?php comment_ID() ?>" itemprop="url"><?php comment_time() ?></a></time>
								<?php edit_comment_link('<p class="comment-meta-item"><i class="material-icons">&#xE254;</i></p>','',''); ?>
								<?php if ($comment->comment_approved == '0') { ?>
								<p class="check comment-meta-item"><i class="material-icons">&#xE835;</i></p>
								<?php } else { ?>
								<p class="check comment-meta-item"><i class="material-icons">&#xE834;</i></p>
								<?php } ?>
							</div>
						</div>

						<?php }

						function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
					</article>

					<?php }

					function __destruct() { ?>

				</section>

				<?php }

			}


			