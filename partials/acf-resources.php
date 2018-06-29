<div class="resources">

<?php

	$resources = 'resources';

	// check if the repeater field has rows of data
	if( have_rows($resources) ):

	 	// loop through the rows of data
	    while ( have_rows($resources) ) : the_row();

	    	$image = get_sub_field('resource_image'); 
	    	$link = get_sub_field('resource_url');

	    	?>


	    	<div class="single-resource">

	        	<h3><?php the_sub_field('resource_name'); ?></h3>

	        	<a target="_blank" href="http://<?php echo $link; ?>">
	        		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
	        	</a>

	        </div>

	    <?php endwhile;

	else :

	    // no rows found
	    echo "Resources coming soon!";

	endif;

?>

</div>
