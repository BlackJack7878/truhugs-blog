<?php get_header(); ?>

<section class="hu-single-intro">

	<div class="hu-content">
		
		<div class="hu-row">

			<div class="hu-col">

				<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_sub_field('post')->ID), 'thumbnail' ); ?>" alt="">

			</div>

			<div class="hu-col">

				<h2>
					<?php the_title(); ?>
				</h2>

				<div>
					<?php the_excerpt(); ?>
				</div> 

				<div class="hu-date">

					<p>
						<?php echo do_shortcode('[rt_reading_time label="" postfix="min read" postfix_singular="min read" post_id="' . get_sub_field('post')->ID . '"]'); ?>
					</p>

					<p>								
						<?php echo get_the_date('F j, Y', get_sub_field('post')->ID); ?>
					</p>
					
				</div>										

			</div>
			
		</div>

	</div>

</section>



<section class="hu-single" id="main-content">

	<div class="hu-content">

		<div class="hu-row" >

			<div class="hu-col" id="sidebar">

				<div class="hu-author-info sidebar__inner" >

					<div class="hu-single-user-data">
						<?php
						global $post;
						$user_id = $post->post_author;
						$meta_id = get_the_author_meta( 'user_email', $user_id );
						$last_name = get_user_meta( $user_id, 'last_name', true );
						$first_name = get_user_meta( $user_id, 'first_name', true );
						$url = get_avatar_url($meta_id);
						$img = '<img alt="" src="'. $url .'">';
						echo $img;
						?>

						<div>
							
							<h5>
								<?php echo $first_name . ' ' . $last_name; ?>
							</h5>

							<p>
								<?php the_field('hu_user_positon', 'user_' . $user_id); ?>
							</p>

						</div>
						
					</div>

					<h3>
						<?php the_title(); ?>
					</h3>

					<div class="hu-date">

						<p>
							<?php echo do_shortcode('[rt_reading_time label="" postfix="min read" postfix_singular="min read" post_id="' . get_sub_field('post')->ID . '"]'); ?>
						</p>

						<p>								
							<?php echo get_the_date('F j, Y', get_sub_field('post')->ID); ?>
						</p>

					</div>	

					<div class="hu-scroll-bar">
						
					</div>

					<!-- Tag or Category -->

					<div class="so-single-tags">
						<?php
						$tags = get_the_tags();

						foreach ($tags as $tag) {
							echo "<a href='" . get_tag_link($tag->term_id) . "'>" . $tag->name . "</a>";
						}

						?>
					</div>

					<div class="hu-go-top" id="go-top">
						<p>
							GO TO TOP 
						</p>

						<div class="hu-top-btn">
						</div>
					</div>

				</div>

			</div>

			<div class="hu-col" id="content">

				<p class="hu-single-edited">
					Edited: <?php echo get_the_modified_time('F j, Y'); ?>
				</p>

				<div class="hu-single-content">

					<?php
								// Start the Loop.
					while ( have_posts() ) :
						the_post();

						the_content();

					endwhile;
					?>

					<div class="hu-author-info">


						<?php if (get_post_type($post) === 'post') : ?>

							<div class="hu-col">

								<?php 
								$user_id = $post->post_author;
								$meta_id = get_the_author_meta( 'user_email', $user_id );
								$last_name = get_user_meta( $user_id, 'last_name', true );
								$first_name = get_user_meta( $user_id, 'first_name', true );

								echo get_avatar($user_id, 30 ); ?>

							</div>

							<div class="hu-col">
								<div class="hu-social">
									<ul>
										<li>
											<a href="<?php the_field('hu_theme_footer_facebook_url', 'option'); ?>">
												<i class="fab fa-facebook-f"></i>
											</a>
										</li>
										<li>
											<a href="<?php the_field('hu_theme_footer_pinterest_url', 'option'); ?>">
												<i class="fab fa-pinterest"></i>
											</a>
										</li>
										<li>
											<a href="<?php the_field('hu_theme_footer_instagram_url', 'option'); ?>">
												<i class="fab fa-instagram"></i>
											</a>
										</li>
									</ul>
								</div>

								<h5 class="hu-single-author-name">
									<?php echo $first_name . ' ' . $last_name?>
								</h5>

								<p class="hu-single-author-pisition">
									<?php the_field('hu_user_positon', 'user_' . $user_id); ?>
								</p>

								<p class="hu-single-author-description">
									<?php the_author_meta('description') ?>
								</p>


							</div>

						<?php endif; ?>


					</div>

				</div>

			</div>

		</div>

	</div>

</section>

<section class="hu-single-similar-posts">

	<div class="hu-content">

		<div class="hu-row">
			<h2>
				Similary Post
			</h2>
		</div>
		
		<div class="hu-row">

			<?php

			$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID) ) );
			if( $related ) foreach( $related as $post ) {
				setup_postdata($post); ?>

				<a href="<?php the_permalink(); ?>">

					<div class="hu-similar-post" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_sub_field('post')->ID), 'thumbnail' ); ?>);">

						<h5>
							<?php the_title(); ?>
						</h5>

						<div class="hu-date">

							<p>
								<?php echo do_shortcode('[rt_reading_time label="" postfix="min read" postfix_singular="min read" post_id="' . get_sub_field('post')->ID . '"]'); ?>
							</p>

							<p>								
								<?php echo get_the_date('F j, Y', get_sub_field('post')->ID); ?>
							</p>

						</div>	

					</div>

				</a> 

			<?php }
			wp_reset_postdata(); ?>
			
		</div>

	</div>
	
</section>

<section class="hu-single-most-popular">

	<div class="hu-content">

		<div class="hu-row">
			<h2>
				Most Popular
			</h2>
		</div>
		
		<div class="hu-row">

			<div class="hu-posts-slider">

				
				<div class="hu-slider-btn prev">	
				</div>

				<div class="hu-single-slider">

					<?php
					global $post;
					$args = array( 'numberposts' => 5, 'offset'=> 1, 'category' => 1 );
					$myposts = get_posts( $args );
					foreach( $myposts as $post ) : setup_postdata($post); ?>

						
						<div class="hu-single-slider-item">

							<a href="<?php the_permalink(); ?>">

								<img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_sub_field('post')->ID), 'thumbnail' ); ?>" alt="">

							</a>

							<a href="<?php the_permalink(); ?>" class='hu-title'>								
								<h5>
									<?php the_title(); ?>
								</h5>
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
								$tags = get_the_tags();

								foreach ($tags as $tag) {
									echo "<a href='" . get_tag_link($tag->term_id) . "'>" . $tag->name . "</a>";
								}

								?>
							</div>

						</div>

					<?php endforeach; ?>

				</div>

			<div class="hu-slider-btn next">	
			</div>

		</div>

	</div>

</div>

</section>

<section class="hu-single-mail-sub">

	<div class="hu-content">
		
		<div class="hu-row">
			
			<h2>
				<?php the_field(''); ?>Stay in touch with TruHugs
			</h2>

			<h6>
				<?php the_field(''); ?>Aliqua aliquip enim ea amet do ipsum anim. Laboris eiusmod nisi veniam excepteur ipsum ullamco voluptate commodo.
			</h6>

			<div>
				
			</div>

		</div>

	</div>
	
</section>


<?php get_footer(); ?>