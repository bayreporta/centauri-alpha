				<div class="clear"></div>
			</div>
			<footer id="footer" role="contentinfo">				
				<div id="social-foot">
					<?php print centalpha_populate_social_media_buttons(); ?>
				</div>
				<div id="copyright">
					<?php echo sprintf( __( '%1$s %2$s %3$s', 'centalpha' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>
				</div>
			</footer>
		</div>
		<?php wp_footer(); ?>
	</body>
	<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/scripts/master.js"></script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-9510600-9', 'auto');
	  ga('send', 'pageview');

	</script>
</html>