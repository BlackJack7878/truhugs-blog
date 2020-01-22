<?php get_header(); ?>

<div class="so-page">
	<div class="so-content">
		<div class="so-row">
			
			<?php
				// Start the Loop.
				while ( have_posts() ) :
					
					the_post();
					
					the_content();

				endwhile;
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>