<?php get_header(); ?>
<div class="row">


	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="small-12 large-12 columns" role="main">
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="row">
					<div class="large-4 columns">
									<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
						<?php the_post_thumbnail( 'thumbnail', array('class' => 'th') ); ?>
									<!-- album illustration-->
					</div>
					<div class="large-4 columns">
			<?php $image1 = wp_get_attachment_image_src( get_field('album_thumb'),'album-illustration' );?>
			<?php //let's start the slider here. The first field is mandatory: ?>
			    <img src="<?php echo $image1[0]; ?>" />
					</div>
					<div class="large-4 columns">
						számok az albumról
					</div>

				</div>
			<?php endif; ?>

			<?php the_content(); ?>
			</div>

		</article>
	<?php endwhile;?>
</div>
	<?php do_action( 'foundationpress_after_content' ); ?>

</div>
<?php get_footer(); ?>
