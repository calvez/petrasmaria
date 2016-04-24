<?php
/*
Template Name: Front
*/
get_header(); ?>

<header>
 	<?php 
	 	$image1 = wp_get_attachment_image_src( get_field('slider_1'), 'home-slider-size' );
	  	$image2 = wp_get_attachment_image_src( get_field('slider_2'), 'home-slider-size' );
	  	$image3 = wp_get_attachment_image_src( get_field('slider_3'), 'home-slider-size' );
	  	$image4 = wp_get_attachment_image_src( get_field('slider_4'), 'home-slider-size' );
	  	$image5 = wp_get_attachment_image_src( get_field('slider_5'), 'home-slider-size' );
	?>

						<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
						  <ul class="orbit-container">
						    <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous Slide</span>&#9664;</button>
						    <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
						    <li class="is-active orbit-slide">
						      <div>
						        <img src="<?php echo $image1[0]; ?>" />
						      </div>
						    </li>
						    <li class="orbit-slide">
						      <div>
						       <img src="<?php echo $image2[0]; ?>" />
						      </div>
						    </li>
						    <li class="orbit-slide">
						      <div>
						      <img src="<?php echo $image3[0]; ?>" />
						      </div>
						    </li>
						    <li class="orbit-slide">
						      <div>
						    <img src="<?php echo $image4[0]; ?>" />
						      </div>
						    </li>
						  </ul>
						  <nav class="orbit-bullets">
						   <button class="is-active" data-slide="0"><span class="show-for-sr">First slide details.</span><span class="show-for-sr">Current Slide</span></button>
						   <button data-slide="1"></button>
						   <button data-slide="2"></button>
						   <button data-slide="3"></button>
						 </nav>
						</div>
<div id="front-hero" role="banner">
	<div class="marketing">
		<div class="tagline">
			<h1><?php bloginfo( 'name' ); ?></h1>
			<h4 class="subheader"><?php bloginfo( 'description' ); ?></h4>
			<a role="button" class="download large button sites-button hide-for-small-only" href="https://github.com/olefredrik/foundationpress">Download FoundationPress</a>
		</div>

		<div id="watch">
			<section id="stargazers">
				<a href="https://github.com/olefredrik/foundationpress">1.5k stargazers</a>
			</section>
			<section id="twitter">
				<a href="https://twitter.com/olefredrik">@olefredrik</a>
			</section>
		</div>
	</div>
</div>
</header>


<?php do_action( 'foundationpress_before_content' ); ?>
<?php while ( have_posts() ) : the_post(); ?>
<section class="intro" role="main">
	<div class="fp-intro">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</div>

	</div>

</section>
<?php endwhile;?>
<?php do_action( 'foundationpress_after_content' ); ?>


<?php get_footer();
