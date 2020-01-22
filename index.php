<?php 

get_header();
global $detect;

?>

<div class="hu-search">
	<div class="hu-content">
		<div class="hu-row">
			<?php if (isset($_GET['s'])) : ?>
				<p>Your search for:</p>
				<h3><?php echo $_GET['s']; ?></h3>
			<?php endif; ?>
		</div>
		<div class="hu-row">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post(); ?>
					
					<div class="hu-search-single">
						<a href="<?php the_permalink(); ?>" class="hu-search-single-image" style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>);"></a>
						<a href="<?php the_permalink(); ?>">
							<h5><?php the_title(); ?></h5>
						</a>

						<div class="hu-search-single-line">
							<span><?php echo do_shortcode('[rt_reading_time]') . 'min read'; ?></span>
							<span><?php echo get_the_date('F j, Y') ?></span>
						</div>

						<div class="hu-search-single-tags">
							<?php
								$tags = get_the_category();

								foreach ($tags as $tag) {
									echo "<a href='" . get_category_link($tag->term_id) . "'>" . $tag->name . "</a>";
								}

							?>
						</div>
					</div>

				<?php endwhile; ?>
		</div>

		<div class="hu-row-pagination hu-row">
			<?php 

				if (!$detect->isMobile()) {

					global $wp_query;
					$paginate_links = paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $wp_query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 1,
						'mid_size'     => 1,
						'prev_next'    => true,
						'add_args'     => false,
						'add_fragment' => '',
						'type'         => 'array'
					) );

				}
				else {

					global $wp_query;
					$paginate_links = paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'total'        => $wp_query->max_num_pages,
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 1,
						'mid_size'     => 1,
						'prev_next'    => true,
						'add_args'     => false,
						'add_fragment' => '',
						'type'         => 'array'
					) );

				}

				foreach ( $paginate_links as $link ) {
					echo sprintf("%02s", $link);
				}
			?>
		</div>
	</div>
</div>

<?php get_footer(); ?>