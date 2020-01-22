	<!DOCTYPE html>
	<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?><?php wp_title("|", true, "left"); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div class="hu-header-mob_slide">
			<div class="hu-header-mob_slide-wrapper">
				<div class="hu-header-mob_slide-menu">
					<?php hu_menu('header-menu-mob'); ?>
					<form>
						<input type="text" name="s" placeholder="Search">
						<button type="submit">Search</button>
					</form>
				</div>
			</div>
		</div>

	<div id="hu-wrapper">

		<div class="hu-overlay"></div>

		<div class="hu-header-bar">
			<div class="hu-content">
				<div class="hu-row">
					<div class="hu-col">
						<p>What's trending: <a href="<?php echo get_post_permalink(get_field('so_theme_product_in_bar', 'option')); ?>"><?php echo get_the_title(get_field('so_theme_product_in_bar', 'option')); ?></a>
							<span>
							<?php echo do_shortcode('[rt_reading_time post_id="' . get_field('so_theme_product_in_bar', 'option') . '"]'); ?> min read
							</span>
						</p>
					</div>
					<div class="hu-col">
						<a href="<?php the_field('so_theme_homepage_url', 'option'); ?>">Go to main site</a>
					</div>
				</div>
			</div>
		</div>

		<header class="hu-header">
			<div class="hu-content">
				<div class="hu-row">
					<div class="hu-col">
						<a href="<?php echo get_home_url(); ?>" class="hu-header-logo">
							<img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo') ,'full')[0]; ?>">
						</a>
					</div>
					<div class="hu-col">
						<div class="hu-header-drop">
							<span>
								Browse Topics
								<div class="hu-header-dropdown">
									<div class="hu-header-dropdown-wrap">
										<div class="hu-header-dropdown-col">
											<h3><?php the_field('so_header_1', 'option'); ?></h3>

											<?php 
												$args = array(
													"post_type" => "post",
													"posts_per_page" => 3,
													"cat" => array(get_field('so_category_1', 'option'))
												);
												$hu_blog = query_posts($args);
											?>

											<div class="hu-header-dropdown-list">

											<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

												<div class="hu-header-dropdown-list-single">
													<a href="<?php the_permalink(); ?>" class="hu-header-dropdown-list-single-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>);"></a>
													<div class="hu-header-dropdown-list-single-last">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														<div class="hu-header-dropdown-list-single-line">
															<span><?php echo do_shortcode('[rt_reading_time]') . 'min read'; ?></span>
															<span><?php echo get_the_date('F j, Y') ?></span>
														</div>
													</div>
												</div>

											<?php endwhile; endif; ?>

											</div>

											<a class="hu-header-dropdown-link" href="<?php echo get_category_link(get_field('so_category_1', 'option')); ?>">View All</a>
										</div>
										<div class="hu-header-dropdown-col">
											<h3><?php the_field('so_header_2', 'option'); ?></h3>

											<?php 
												$args = array(
													"post_type" => "post",
													"posts_per_page" => 3,
													"cat" => array(get_field('so_category_2', 'option'))
												);
												$hu_blog = query_posts($args);
											?>

											<div class="hu-header-dropdown-list">

											<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

												<div class="hu-header-dropdown-list-single">
													<a href="<?php the_permalink(); ?>" class="hu-header-dropdown-list-single-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>);"></a>
													<div class="hu-header-dropdown-list-single-last">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														<div class="hu-header-dropdown-list-single-line">
															<span><?php echo do_shortcode('[rt_reading_time]') . 'min read'; ?></span>
															<span><?php echo get_the_date('F j, Y') ?></span>
														</div>
													</div>
												</div>

											<?php endwhile; endif; ?>

											</div>

											<a class="hu-header-dropdown-link" href="<?php echo get_category_link(get_field('so_category_2', 'option')); ?>">View All</a>
										</div>
										<div class="hu-header-dropdown-col">
											<h3><?php the_field('so_header_3', 'option'); ?></h3>

											<?php 
												$args = array(
													"post_type" => "post",
													"posts_per_page" => 3,
													"cat" => array(get_field('so_category_3', 'option'))
												);
												$hu_blog = query_posts($args);
											?>

											<div class="hu-header-dropdown-list">

											<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

												<div class="hu-header-dropdown-list-single">
													<a href="<?php the_permalink(); ?>" class="hu-header-dropdown-list-single-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>);"></a>
													<div class="hu-header-dropdown-list-single-last">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														<div class="hu-header-dropdown-list-single-line">
															<span><?php echo do_shortcode('[rt_reading_time]') . 'min read'; ?></span>
															<span><?php echo get_the_date('F j, Y') ?></span>
														</div>
													</div>
												</div>

											<?php endwhile; endif; ?>

											</div>

											<a class="hu-header-dropdown-link" href="<?php echo get_category_link(get_field('so_category_3', 'option')); ?>">View All</a>
										</div>
									</div>
								</div>
							</span>
						</div>
					</div>

					<?php wp_reset_query(); ?>

					<div class="hu-col">
						<div class="hu-header-trigger">
							<i></i>
							<i></i>
							<i></i>
						</div>
						<div class="hu-header-search">
							<div class="hu-header-search-icon">
								<i class="fas fa-search"></i>
								<i class="fas fa-times"></i>
							</div>
							<?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="hu-header-dropdown hu-content">
				<div class="hu-row">
				</div>
			</div>
		</header>

