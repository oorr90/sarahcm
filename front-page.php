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

<div class="testing home-highlights">
	
	<?php

		/*
		*  get all custom fields and print_r for testing
		*/
		$fields = get_field_objects();
		echo "<!--";
		//print_r( $fields ); 
		echo "-->";

		/*
		* Store headers, descriptions, and images in arrays
		*/
		$headers = array();
		$descriptions = array();
		$images = array();

		/*
		*  get all custom fields, loop through them and create a label => value markup
		*/
		if( $fields ):
		
			foreach( $fields as $field_name => $field ):
			
				if ($field['type'] == 'text'):

					array_push($headers, $field['value']);

				elseif($field['type'] == 'textarea'):

					array_push($descriptions, $field['value']);

				else:

					array_push($images, $field['value']);

				endif;
			endforeach;
		endif;

		echo "<!--";
		print_r( $images ); 
		echo "-->";

		for($x = 0; $x < 3; $x++): ?>

			<div class="single-highlight">

				<img src="<?php echo $images[$x]['sizes']['medium']; ?>" alt="">

				<h2><?php echo $headers[$x]; ?></h2>

				<p><?php echo $descriptions[$x]; ?></p>

			</div>

		<?php endfor;

	?>
	

</div>


<?php get_footer(); ?>
