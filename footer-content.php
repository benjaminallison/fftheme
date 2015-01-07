<footer id="footer">
	<div class="innerWrap">
		<div id="footerNav" class="footerColumn">
			<h4>Find your way</h4>
			<?php wp_nav_menu( array('before' =>'&raquo; ' )); ?>
		</div>
		<div id="footerContact" class="footerColumn">
			<h4>Need some help?</h4>
			<p>1-800-776-1356</p>
			<p><a href="#">info@izcorp.com</a></p>
			<div id="google_translate_element"><span class="icomoon">&#xe619;</span></div>
			<script type="text/javascript">
				function googleTranslateElementInit() {
					new google.translate.TranslateElement({
						pageLanguage: 'en',
						layout: google.translate.TranslateElement.InlineLayout.SIMPLE
					},
					'google_translate_element'
					);
				}
			</script>
			<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
		</div>
		<div id="footerSocial" class="footerColumn">
			<h4>Be social</h4>
			<ul id="socialLinks">
				<li><a href="http://twitter.com/izcorp" target="_blank" class="twitter" target="_blank">Twitter</a></li>
				<li><a href="http://www.facebook.com/pages/iZ-Technology-Corporation/27158064542" target="_blank" class="facebook" target="_blank">Facebook</a></li>
				<li><a href="http://www.youtube.com/iztechnology" target="_blank" class="youtube" target="_blank">YouTube</a></li>
				<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			</ul>
		</div>
		<div id="footerBlurb">
			<h4>© <?php echo date("Y"); ?> iZ Technology Corporation</h4>
			<p>iZ Technology proudly manufactures the RADAR recording system, and ADA digital converters. At home in the studio, hollywood sound stages, and mobile rigs, RADAR is the finest recording system in the world.</p>
		</div>
	</div>
</footer>