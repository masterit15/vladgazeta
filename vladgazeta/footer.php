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
</div><!-- wrapper -->
<!-- end content -->
<footer class="footer">
	<div class="container">
		<div class="footer_items">
			<div class="footer_items_item">
				<ul>
					<li><strong>Телефон: </strong><a href="tel:<?= get_theme_mod('phones') ?>"><?= get_theme_mod('phones') ?></a></li>
					<li><strong>Е-почта: </strong><a href="email:<?= get_theme_mod('email') ?>"><?= get_theme_mod('email') ?></a></li>
					<li><strong>Адрес: </strong><?= get_theme_mod('address') ?></li>
				</ul>
			</div>
		</div>
		<div class="footer_bottom">
			<p>О замеченных ошибках просьба сообщать при помощи выделения текста и комбинации клавишь Ctrl/Cmd + Enter</p>
			<p><?= get_theme_mod('copypast') ?></p>
		</div>
		<div class="copyright">
			<ul class="socials">
				<li><a href="<?= get_theme_mod('soc_fac') ?>"><i class="fa fa-facebook"></i></a></li>
				<li><a href="<?= get_theme_mod('soc_inst') ?>"><i class="fa fa-instagram"></i></a></li>
				<li><a href="<?= get_theme_mod('soc_vk') ?>"><i class="fa fa-vk"></i></a></li>
				<li><a href="<?= get_theme_mod('soc_ok') ?>"><i class="fa fa-odnoklassniki"></i></a></li>
			</ul>
			<span><?= get_theme_mod('copyright') ?></span>
		</div>
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