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

				<div class="home-intro-image"><?php the_post_thumbnail( 'medium', array('class'=>'intro-image') ); ?></div>

				<div class="home-intro-content"><p><?php the_content(); ?></p></div>

			<?php endwhile;

		endif;

	?>
</div>

<?php get_template_part( 'partials/acf', 'featured' ); ?>

<div class="testimonials">

	<?php 

		$testimonialID = 1;
		
		if ( function_exists( 'strong_testimonials_view' ) ):

	    	strong_testimonials_view( $testimonialID );

		endif; 

	?>

</div>


<?php get_footer(); ?>
