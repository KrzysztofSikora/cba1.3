<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ultrabootstrap
 */

?>




<div class="container-fluid" id="footbar">





	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
<!--			<div class="col-md-3">-->
<!--				<div class="fb">-->
<!---->
<!--					--><?php
//					$facebook =  esc_url(get_theme_mod ('facebook_textbox'));
//
//					if($facebook){?>
<!--						<li><a href="--><?php //echo $facebook;?><!--"><i class="fa fa-facebook"></i></a></li>-->
<!--					--><?php //}?>
<!---->
<!--				</div>-->
<!--			</div>-->
			<div class="col-md-3">
				<div class="fb">

						<li><a href="https://www.facebook.com/krzysztof.sikora.372/"><i class="fa fa-facebook"></i></a></li>

				</div>
			</div>
			<div class="col-md-3">
				<div class="yt"><a href="https://www.youtube.com"><i class="icon-snapchat-square"></i></a></div>
			</div>

			<div class="col-md-3">
				<div class="tw"><a href="https://www.youtube.com/channel/UCHe4j0fsSoJDf5FuGxCJqNw"><i class="icon-youtube"></i></a></div>

			</div>

			<div class="col-md-3">
				<div class="gplus"><a href="https://github.com/KrzysztofSikora"><i class="icon-github-squared"></i></a></div>
			</div>

		</div>
		<div class="col-md-2"></div>

	</div>
</div>
<!-- Tab to top scrolling -->
<div class="scroll-top-wrapper"> <span class="scroll-top-inner">
  			<i class="fa fa-2x fa-angle-up"></i>
    		</span>
</div>
<footers>
	<div class="container footers">
		<div class="row">
			<?php dynamic_sidebar( 'footer-1' ); ?>
			<?php dynamic_sidebar( 'footer-2' ); ?>
			<?php dynamic_sidebar( 'footer-3' ); ?>
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div>
	</div>
</footers>
<footer>
	<div class="container">

		<!--				--><?php //
		//                    $show_social_in_footer = get_theme_mod('socialicon_display' );
		//                    {?><!--   -->
		<!--			        <div class="pull-left">-->
		<!--				            <ul class="list-inline social">-->
		<!--	                            --><?php //
		//	                            $facebook =  esc_url(get_theme_mod ('facebook_textbox'));
		//	                            $twitter = esc_url(get_theme_mod('twitter_textbox'));
		//	                            $googleplus = esc_url(get_theme_mod('googleplus_textbox'));
		//	                            $youtube = esc_url(get_theme_mod('youtube_textbox'));
		//	                            $linkedin = esc_url(get_theme_mod('linkedin_textbox'));
		//	                            $pinterest = esc_url(get_theme_mod('pinterest_textbox'));
		//	                            if($facebook){?>
		<!--	                              <li><a href="--><?php //echo $facebook;?><!--"><i class="fa fa-facebook"></i></a></li>-->
		<!--	                            --><?php //}
		//	                            if($twitter){?>
		<!--	                              <li><a href="--><?php //echo $twitter;?><!--"><i class="fa fa-twitter"></i></a></li>-->
		<!--	                            --><?php //}
		//	                            if($googleplus) {?>
		<!--	                              <li><a href="--><?php //echo $googleplus;?><!--"><i class="fa fa-google-plus"></i></a></li>-->
		<!--	                            --><?php //}
		//	                            if($youtube){?>
		<!--	                              <li><a href="--><?php //echo $youtube;?><!--"><i class="fa fa-youtube-play"></i></a></li>-->
		<!--	                            --><?php //}
		//	                            if($linkedin){?>
		<!--	                              <li><a href="--><?php //echo $linkedin;?><!--"><i class="fa fa-linkedin"></i></a></li>-->
		<!--	                            --><?php //}
		//	                            if($pinterest){?>
		<!--	                              <li><a href="--><?php //echo $pinterest;?><!--"><i class="fa fa-pinterest"></i></a></li>-->
		<!--	                            --><?php //}?>
		<!--                        	</ul>-->
		<!--					</div>-->
		<!--				--><?php //}?><!-- -->

		<div class="pull-center">
			krzysztofsikora24.pl © 2016 <a href="http://wordpress.org">Wordpress  </a>Developed<a href="http://krzysztofsikora24.pl"> Krzysztof Sikora</a>
		</div>
	</div>

</footer>



<?php wp_footer(); ?>




</body>
</html>