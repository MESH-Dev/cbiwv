<div class="container">
	<div class="row home-row instagram">
		<div class="twelve columns ">
			<h6>Follow Our Inspiration on tumblr</h6>

		</div>

		<?php echo get_sidebar(); ?>

	</div>
</div>
<footer>
	<div class="container">
		<div class="ten columns footer-menu">
			<?php if(has_nav_menu('main_nav')){
					$defaults = array(
						'theme_location'  => 'main_nav',
						'menu'            => 'main_nav',
						'container'       => false,
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 2,
						'walker'          => ''
					); wp_nav_menu( $defaults );
				}else{
					echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
				} ?>


		</div>
		<div class="two columns credits">
			<div class="footer-social">
				<?php if( get_field( "email", 4 ) ): ?>
	   			 <a href="mailto:<?php the_field( "email", 4 ); ?>"><i class="fa fa-envelope"></i></a>
				<?php endif;
				if( get_field( "facebook", 4 ) ): ?>
	   			 <a href="<?php the_field( "facebook", 4 ); ?>"><i class="fa fa-facebook"></i></a>
				<?php endif;
				if( get_field( "twitter", 4 ) ): ?>
	   			 <a href="<?php the_field( "twtter", 4 ); ?>"><i class="fa fa-twitter"></i></a>
				<?php endif;
				if( get_field( "tumblr", 4 ) ): ?>
	   			 <span class="social-icon first"><a href="<?php the_field( "tumblr", 4 ); ?>"><i class="fa fa-tumblr"></i></a>
				<?php endif;
				if( get_field( "instagram", 4 ) ): ?>
	   			 <a href="<?php the_field( "instagram", 4 ); ?>"><i class="fa fa-instagram"></i></a>
				<?php endif;
				if( get_field( "pinterest", 4 ) ): ?>
	   			 <a href="<?php the_field( "pinterest", 4 ); ?>"><i class="fa fa-pinterest"></i></a>
				<?php endif; ?>
			</div>
			<p>&copy;<?php echo date('Y');?>   <?php bloginfo('name'); ?>.  </p>
			<p>Designed by <a href="http://meshfresh.com">MESH</a></p>
			<div class="hayworth"><a href="http://www.haworth.com/" targer='_blank'><img src="<?php bloginfo('template_directory'); ?>/assets/img/hayworth.png"  alt="A Hayworth Preferred Dealer"></a></div>
		</div>
	</div>


</footer>

<?php wp_footer(); ?>
</body>

</html>
