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
</div><!-- offset-xl-1 -->
</div><!-- row -->
</div><!-- container -->
</section>
<!-- end content -->
<footer>
	<div class="container-fluid">
		<div class="footer-wrapper">
			<div class="row">
				<div class="col-12 col-xl-10 offset-xl-1">
					<?php dynamic_sidebar('footer'); ?>
					<div class="col-sm-9">
						<p>О замеченных ошибках просьба сообщать при помощи выделения текста и комбинации клавишь Ctrl/Cmd + Enter</p></br>
						<p>Использование информации из материалов сайта возможно только с указанием источника и проставлением гиперссылки на сайт vladgazeta.online. Копирование и использование полных материалов сайта без изменений возможно лишь с разрешения редакции</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="copyright">
			<div class="socials">
					<a href=""><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
					<a target="_blank" href="https://www.instagram.com/gazeta_vladikavkaz/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			</div>
			<span><?= date('Y') ?> © Сайт газеты "Владикавказ"</span>
	</div>
</footer>
<div id="toTop"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
<div class="metrik">
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(d, w, c) {
			(w[c] = w[c] || []).push(function() {
				try {
					w.yaCounter46320354 = new Ya.Metrika({
						id: 46320354,
						clickmap: true,
						trackLinks: true,
						accurateTrackBounce: true,
						webvisor: true
					});
				} catch (e) {}
			});

			var n = d.getElementsByTagName("script")[0],
				s = d.createElement("script"),
				f = function() {
					n.parentNode.insertBefore(s, n);
				};
			s.type = "text/javascript";
			s.async = true;
			s.src = "https://mc.yandex.ru/metrika/watch.js";

			if (w.opera == "[object Opera]") {
				d.addEventListener("DOMContentLoaded", f, false);
			} else {
				f();
			}
		})(document, window, "yandex_metrika_callbacks");
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/46320354" style="position:absolute; left:-9999px;" alt="" /></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->
</div>
<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>
<?php wp_footer(); ?>
</body>

</html>