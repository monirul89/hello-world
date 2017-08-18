<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since The Moms Embroidery 1.0
 */
?>
   
    </div>
  </div>
</div>
<footer id="mastfooter" class="site-footer" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <?php if ( is_active_sidebar( 'footerwidgets' )  ) : ?>	
              <?php dynamic_sidebar( 'footerwidgets' ); ?>	
          <?php endif; ?>
      </div>             
      <div class="col-md-12">
          <p style="margin-top: 15px" class="text-center">&copy; Copyright The Mom's Embroidery</p>
      </div>
    </div>
  </div> 
</footer><!-- .site-footer -->


<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-48453684-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
