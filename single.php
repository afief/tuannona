<?php
/**
 * The template for displaying all single posts.
 *
 * @package TuanNona
 */

get_header(); ?>

<div class="cards">
	<?php if ( have_posts() ) :	?>

	<?php while ( have_posts() ) :
	the_post();
	?>

	<div class="mdl-card mdl-shadow--2dp demo-card-wide">
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
				the_content();
			?>
		</div>

		<?php $ava = getAva(get_the_author_meta( 'ID' )); ?>

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
