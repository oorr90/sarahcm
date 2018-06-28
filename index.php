<?php get_header(); ?>

<div class="main-page">
	<div class="col col1">
		<?php if ( have_posts() ) : ?>
		    <?php while ( have_posts() ) : the_post(); ?>

		        <div class="page-intro">
		    		<h1><?php the_title(); ?></h1>

		    		<p><?php the_content(); ?></p>
		    	</div>

		    	<?php 

		    		if( is_page( 'Services' ) ):

		    			get_template_part( 'partials/acf', 'services' );

		    		endif;

		    	?>

		    <?php endwhile; ?>
		<?php endif; ?>
	</div>

	<div class="col col2">
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
