
	<footer class="hu-footer">

		<div class="hu-content">

		

				<div class="hu-row">
					<p><?php the_field('hu_theme_footer_sale_note_text', 'option'); ?>, ends in 
						<span class="myCountdown" data-date="<?php the_field('hu_theme_footer_sale_ends_on', 'option'); ?>">
							<span><span class="counter-days"></span> Days</span>
							<span><span class="counter-hours"></span> hr</span>
							<span><span class="counter-minutes"></span> min</span>
							<span><span class="counter-seconds"></span> sec</span>
						</span>
					</p>
					<ul>
						<li><a href="<?php the_field('hu_theme_footer_link_url_1', 'option'); ?>"><?php the_field('hu_theme_footer_link_text_1', 'option'); ?></a></li>
						<li><a href="<?php the_field('hu_theme_footer_link_url_2', 'option'); ?>"><?php the_field('hu_theme_footer_link_text_2', 'option'); ?></a></li>
					</ul>
				</div>



		</div>

		<div class="hu-content">

			<div class="hu-row">
				<div class="hu-col">
					<img src="<?php echo wp_get_attachment_image_src(get_theme_mod('custom_logo') ,'full')[0]; ?>">
					<p><?php the_field('hu_theme_footer_footer_text', 'option'); ?></p>
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
				<div class="hu-col">
					<h5><?php the_field('hu_theme_footer_menu_title_1', 'option'); ?></h5>
					<?php hu_menu('footer-menu-1'); ?>
				</div>
				<div class="hu-col">
					<h5><?php the_field('hu_theme_footer_menu_title_2', 'option'); ?></h5>
					<?php hu_menu('footer-menu-2'); ?>
				</div>
				<div class="hu-col">
					<h5><?php the_field('hu_theme_footer_menu_title_3', 'option'); ?></h5>
					<?php hu_menu('footer-menu-3'); ?>
				</div>
			</div>

		</div>

		<div class="hu-content">
			
			<div class="hu-row">
				<img src="<?php echo get_template_directory_uri() . '/assets/img/cards.png' ?>">
				<ul>
					<li>
						<a href="<?php the_field('hu_theme_footer_privacy_policy_url', 'option'); ?>">Privacy</a>
					</li>
					<li>
						<a href="<?php the_field('hu_theme_footer_terms_of_use_url', 'option'); ?>">Terms of Use</a>
					</li>
					<li>
						<a href="https://solitude.agency/">Made by Solitude</a>
					</li>
				</ul>
				<p><?php the_field('hu_theme_footer_copyright', 'option'); ?></p>
			</div>

		</div>

	</footer>

</div>

<?php wp_footer(); ?>

</body>
</html>