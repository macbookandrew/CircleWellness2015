<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">

            <?php if ( function_exists( 'home_quick_links' ) ) { home_quick_links(); } ?>

			<?php get_sidebar( 'main' ); ?>

			<div class="site-info">
				<?php do_action( 'twentythirteen_credits' ); ?>
                <span>&copy;<?php echo date('Y'); ?></span> <span><a href="http://wordpress.org/" title="Semantic Personal Publishing Platform">Powered by WordPress</a></span> <span>Designed by <a href="http://andrewrminion.com/?utm_source=client-site&utm_campaign=CircleWellness.com&utm_content=site-footer" title="AndrewRMinion Design">AndrewRMinion Design</a></span> <span>Maintained by <?php bloginfo( 'name' ); ?></span> <span><?php wp_loginout(); ?></span>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
