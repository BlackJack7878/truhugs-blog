<?php

get_header();
/* Template Name: Featuring-post */

?>

<section class="hu-blog-intro" style="background-image: url(<?php the_field('hu_theme_intro_background', 'option'); ?>);">
	<div class="hu-content">
		<div class="hu-row">
			<h1><?php the_field('hu_theme_blog_title', 'option'); ?></h1>
			<p>
				<?php the_field('hu_theme_blog_sub_title','option'); ?>
			</p>
		</div>
	</div>
</section>

<section class="hu-blog-before-info">

	<div class="hu-content">
		
		<div class="hu-row">

			<h2>
				<?php the_field('hu_them_before_info_blog_title','option') ?>
			</h2>

			<div class="hu-blog-before-info-text">

				<p>
					<?php the_field('hu_them_before_info_blog_text_#1','option') ?>
				</p>

				<p>				
					<?php the_field('hu_them_before_info_blog_text_#2','option') ?>
				</p>

			</div>
			
		</div>

	</div>
	
</section>

<section class="hu-blog-featured">

	<div class="hu-content">

		<div class="hu-row">

			<?php
			if( have_rows('hu_theme_featured_posts', 'option') ):
				while ( have_rows('hu_theme_featured_posts', 'option') ) : the_row(); ?>

					<div class="hu-blog-featured-single">

						<div class="hu-blog-featured-single-img">
							<a href="<?php the_permalink(get_sub_field('post')->ID); ?>" class="so-blog-featured-single-image">
								<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_sub_field('post')->ID), 'thumbnail' ); ?>">
							</a>
						</div>


						<div class="hu-blog-featured-single-info">
							
							<a href="<?php the_permalink(get_sub_field('post')->ID); ?>">
								<h3><?php echo get_the_title(get_sub_field('post')->ID); ?></h3>
							</a>

							<div class="hu-date">

								<p>
									<?php echo do_shortcode('[rt_reading_time label="" postfix="min read" postfix_singular="min read" post_id="' . get_sub_field('post')->ID . '"]'); ?>
								</p>

								<p>								
									<?php echo get_the_date('F j, Y', get_sub_field('post')->ID); ?>
								</p>

							</div>	

							<div class="so-single-tags">
								<?php
								$tags = get_the_tags(get_sub_field('post')->ID);

								foreach ($tags as $tag) {
									echo "<a href='" . get_tag_link($tag->term_id) . "'>" . $tag->name . "</a>";
								}

								?>
							</div>

						</div>

					</div>

			<?php endwhile; endif; ?>

		</div>

	</div>

</section>


<?php get_footer(); ?>
