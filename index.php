<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TuanNona
 */

get_header(); ?>

<div class="avatars">
	<div class="kiri">
		<div class="wrapper">
			<?php
			$ava = get_avatar_url(get_avatar( 1, 130 ));
			echo '<div class="ava"><a href="' . get_author_posts_url(1) . '"><div class="avatar" style="background-image: url(' . $ava . ')"></div></a></div>';
			?>
		</div>
	</div>
	<div class="kanan">
		<div class="wrapper">
			<?php
			$ava = get_avatar_url(get_avatar( 2, 130 ));
			echo '<div class="ava"><a href="' . get_author_posts_url(2) . '"><div class="avatar" style="background-image: url(' . $ava . ')"></div></a></div>';
			?>
		</div>
	</div>
</div>


<div class="cards">
	<?php if ( have_posts() ) :
		$i = 0;
	?>

		<?php while ( have_posts() ) :
			$i = $i + 1;
			the_post();
		?>

			<div class="mdl-card <?php echo ($i > 1)?((($i % 2) == 0)?"genap":"ganjil"):"pertama" ?> mdl-shadow--2dp demo-card-wide">
				<?php
				if ( has_post_thumbnail(get_the_ID())) {
					$imgUrl = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium');
				}
				?>
				<div class="mdl-card__title" style="background: url('<?= $imgUrl[0]; ?>') center / cover;">
					<h2 class="mdl-card__title-text title"><a href="<?=get_permalink()?>"><?php the_title(); ?></a></h2>
				</div>
				<div class="mdl-card__supporting-text content">
					<?php
					if ($i == 1)
						the_content();
					else
						the_excerpt();
					?>
				</div>

				<?php $ava = get_avatar_url(get_avatar( get_the_author_meta( 'ID' ), 64 )); ?>

				<div class="mdl-card__actions mdl-card--border meta">
					<table>
						<tr>
							<td width="50px"><div class="avatar" style="background-image: url('<?=$ava;?>')"></div></td>
							<td>
								<div class="user">
									<div class="name"><?= get_the_author(); ?></div>
									<div class="date"><?= get_the_date(); ?></div>
								</div>
							</td>
							<td class="td-comment">
								<a href="<?= get_permalink(); ?>">
									<div class="comment material-icons mdl-badge" data-badge="<?php comments_number( '♥', '1', '%' ); ?>">&#xE0B9;</div>
								</a>
							</td>
						</tr>
					</table>
				</div>

				<div class="mdl-card__menu">
					<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
						<i class="material-icons">share</i>
					</button>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
