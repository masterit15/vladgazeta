<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vladgzeta
 */

?>
</div><!-- row -->
</div><!-- container -->
</section>
<!-- end content -->
<footer>
	<div class="container">
		<div class="footer-wrapper">
			<div class="row">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div>
		</div>
	</div>
	<div class="copyright">
		<div class="container">
			<div class="col-sm-3">
				<span>2017 © Сайт газеты "Владикавказ"</span>
			</div>
			<div class="col-sm-9">
				<p>Обо всех замеченных ошибках при работе сайта просьба сообщать при помощи формы обратной связи
					Использование информации из материалов сайта возможно только с указанием источника и проставлением гиперссылки на сайт vladgazeta.online. Копирование и использование полных материалов сайта без изменений возможно лишь с разрешения редакции<br>
				</p>
			</div>
			<div class="metrik">

<!-- <a href="https://metrika.yandex.ru/stat/?id=46320354&amp;from=informer"
target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/46320354/3_0_666666FF_666666FF_1_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="46320354" data-lang="ru" /></a>
<span id="sputnik-informer"></span> -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function() {
			try {
				w.yaCounter46320354 = new Ya.Metrika({
					id:46320354,
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
		s.src = "https://mc.yandex.ru/metrika/watch.js";

		if (w.opera == "[object Opera]") {
			d.addEventListener("DOMContentLoaded", f, false);
		} else { f(); }
	})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/46320354" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</div>
</div>
</div>

</footer>
<div id="toTop" ><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.min.js"></script>
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<?php wp_footer(); ?>
</body>
</html>
