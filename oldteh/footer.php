<footer class="footer">
    <div class="footer-wrapper">
        <!--<img src="<?php bloginfo('template_url'); ?>/img/logo.png">-->
		<img src="/wp-content/uploads/2019/01/logo1.png" alt="" title="">
        <div class="footer-phone">
            <p class="header-phone-first"><?php the_field('phone1', 5); ?></p>
            <p><?php the_field('phone2', 5); ?></p>
            <!--<p><?php // the_field('phone3', 5); ?></p>-->
            <a href="#contact_form_pop" class="header-phone-email fancybox-inline">Обратная связь</a>
        </div>
        <div class="footer-address">
            <p class="address-worked"><?php the_field('address', 5); ?> <br/> <a href="<?php the_permalink(20); ?>">Схема проезда</a></p>
            <p class="clock-worked"><?php the_field('schedule', 5); ?> </p>
        </div>
        <div class="clear"></div>
    </div>

    <div class="footer-mobile-bottom">
        <a href="tel:+74732291343"><i class="fa fa-phone" aria-hidden="true"></i></a>
        <a href="#contact_form_pop" class="fancybox-inline"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
        <a href="<?php the_permalink(20); ?>"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
        <a class="open-mobile-menu"><i class="fa fa-bars" aria-hidden="true"></i></a>
    </div>
    <?php if (is_front_page()) {?>
        <div class="copyright">
			<a href="https://vzh.ru/services/sozdanie-sajta/?from=<?php echo $_SERVER['HTTP_HOST'];?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/img/aspect.png" alt="разработка сайта под продвижение в аспект"/></a>
		</div>
    <?php } else { ?>
        <div class="copyright">
            <img src="<?php bloginfo('template_url'); ?>/img/aspect.png" alt="разработка сайта под продвижение в аспект"/>
        </div>
    <?php } ?>
	
		<div class="counters">
			<!--noindex-->
<!--LiveInternet counter--><script type="text/javascript">
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t44.4;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";h"+escape(document.title.substring(0,150))+";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
</script><!--/LiveInternet-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter49621729 = new Ya.Metrika2({
                    id:49621729,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/49621729" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
			<!--/noindex-->
		</div>
	<div class="fancybox-hidden">
		<div id="contact_form_pop">                
			<?php echo do_shortcode( '[contact-form-7 id="148" title="Всплывающая форма связи"]' ); ?>
		</div>
		<div id="contact_form_pop2">                
			<?php echo do_shortcode( '[contact-form-7 id="156" title="Всплывающая форма связи заказ"]' ); ?>
		</div>
		<div id="contact_form_pop1">
			<?php the_field('politic_conf', 5); ?>
		</div>
	</div>
	
</footer><!-- .footer -->
<!-- Pixel -->
<script type="text/javascript">
    (function (d, w) {
        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script");
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://qoopler.ru/index.php?ref="+d.referrer+"&page=" + encodeURIComponent(w.location.href);
            n.parentNode.insertBefore(s, n);
    })(document, window);
</script>
<!-- /Pixel -->
<?php wp_footer(); ?>
</body>
</html>