<?php get_header(); ?>

<div class="sub-head-home">
	<h1>Sarah Cyr-Mutty</h1>
	<h2>M.ED</h2>
	<div class="sub-head-tagline">
		<p>Sexuality Educator,</p>
		<p>Writer,</p>
		<p>Consultant,</p>
		<p>And Speaker.</p>
	</div>
</div>

<div class="home-intro">
	<?php

		if ( have_posts() ):

			while( have_posts() ): the_post(); ?>

				<?php the_post_thumbnail( 'medium', array('class'=>'intro-image') ); ?>

				<div class="home-intro-content"><p><?php the_content(); ?></p></div>

			<?php endwhile;

		endif;

	?>
</div>

<div class="home-highlights">

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="single-highlight">

			<?php 

				//var_dump(get_field('highlight_image'));
				$image = get_field('highlight_image');

				// vars
				$url = $image['url'];
				$alt = $image['alt'];
				$caption = $image['caption'];

				// image size
				$thumb = $image['sizes'][ 'medium' ];

			?>

			<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />

			<h2><?php the_field('home_highlight_header'); ?></h2>

			<p><?php the_field('home_highlight_text'); ?></p>

		</div>

	<?php endwhile; ?>
	

</div>

<?php get_footer(); ?>
