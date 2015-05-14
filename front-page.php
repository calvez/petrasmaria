<?php
/*
Template Name: Petras-frontpage
*/
get_header(); ?>

<!--
Slider start
-->

<div class="fullWidth">
 	<?php
	 	$image1 = wp_get_attachment_image_src( get_field('slider_1'), 'home-slider-size' );
	  	$image2 = wp_get_attachment_image_src( get_field('slider_2'), 'home-slider-size' );
	  	$image3 = wp_get_attachment_image_src( get_field('slider_3'), 'home-slider-size' );
	  	$image4 = wp_get_attachment_image_src( get_field('slider_4'), 'home-slider-size' );
	  	$image5 = wp_get_attachment_image_src( get_field('slider_5'), 'home-slider-size' );
	?>
	<?php //let's start the slider here. The first field is mandatory: ?>
<ul data-orbit data-options="animation_speed:1500; animation:fade; slide_number:false; timer:false;">
  <li>
    <img src="<?php echo $image1[0]; ?>" />
  </li>
  <?php if(get_field('slider_2')) { // subsequent fields are not mandatory ?>
  <li>
    <img src="<?php echo $image2[0]; ?>" />
  </li>
  <?php } ?>
  <?php if(get_field('slider_3')) { ?>
  <li>
    <img src="<?php echo $image3[0]; ?>" />
  </li>
  <?php } ?>
  <?php if(get_field('slider_4')) { ?>
  <li>
    <img src="<?php echo $image4[0]; ?>" />
  </li>
  <?php } ?>
  <?php if(get_field('slider_5')) { ?>
  <li>
    <img src="<?php echo $image5[0]; ?>" />
  </li>
  <?php } ?>
</ul>
</div>

<!--
End of Slider
-->

<div class="row">
	<div class="small-11 small-centered columns" role="main">
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
	</div>
</div>
<?php get_footer(); ?>
