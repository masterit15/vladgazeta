<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vladgzeta
 */

get_header(); ?>
<style>

navigation{position: relative;z-index: 10;}
.copyright{z-index: 10;}
.mm-menu.mm-offcanvas.mm-opened{z-index: 10;}
.nav-wrapper{
position: fixed;
top: 0;
left: 0;
width: 100%;
padding: 0;
margin: 0;
}
.main-nav{
margin:0;
}
.error-404{min-height: 250px;}
.content-snow {
  height: 100%;
min-height: 100vh;
  position: fixed;
top: 0;
left: 0;
width:100%;
  z-index: 1;
  background-color: #d2e1ec;
  background-image: -webkit-linear-gradient(top, #bbcfe1 0%, #e8f2f6 80%);
  background-image: linear-gradient(to bottom, #bbcfe1 0%, #e8f2f6 80%);
  overflow: hidden;
}

.snow {
  position: absolute;
  top: 0;
  left: 0;
  pointer-events: none;
  z-index: 20;
}

.main-text {
 padding: 0;
text-align: center;
line-height: 2em;
font-size: 5vh;
position: absolute;
left: 0;
top: 35%;
right: 0;
}

.home-link {
  font-size: 0.6em;
  font-weight: 400;
  color: inherit;
  text-decoration: none;
  opacity: 0.6;
  border-bottom: 1px dashed rgba(93, 115, 153, 0.5);
}
.home-link:hover {
  opacity: 1;
}

.ground {
  height: 160px;
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  background: #f6f9fa;
  box-shadow: 0 0 10px 10px #f6f9fa;
}
.ground:before, .ground:after {
  content: '';
  display: block;
  width: 250px;
  height: 250px;
  position: absolute;
  top: -62.5px;
  z-index: -1;
  background: transparent;
  -webkit-transform: scaleX(0.2) rotate(45deg);
          transform: scaleX(0.2) rotate(45deg);
}
.ground:after {
  left: 50%;
  margin-left: -166.66667px;
  background: #f6f9fa;
}
.ground:before {
  right: 50%;
  margin-right: -166.66667px;
  background: #f6f9fa;
}

.mound {
  margin-top: -10px;
  font-weight: 800;
  font-size: 180px;
  text-align: center;
  color: #dd4040;
  pointer-events: none;
}
.mound:before {
  content: '';
  display: block;
  width: 600px;
  height: 200px;
  position: absolute;
  left: 50%;
  margin-left: -300px;
  top: 50px;
  z-index: 1;
  border-radius: 100%;
  background-color: #e8f2f6;
  background-image: -webkit-linear-gradient(top, #dee8f1, #f6f9fa 60px);
  background-image: linear-gradient(to bottom, #dee8f1, #f6f9fa 60px);
}
.mound:after {
  content: '';
  display: block;
  width: 28px;
  height: 6px;
  position: absolute;
  left: 50%;
  margin-left: -150px;
  top: 68px;
  z-index: 2;
  background: #dd4040;
  border-radius: 100%;
  -webkit-transform: rotate(-15deg);
          transform: rotate(-15deg);
  box-shadow: -56px 12px 0 1px #dd4040, -126px 6px 0 2px #dd4040, -196px 24px 0 3px #dd4040;
}

.mound_text {
  -webkit-transform: rotate(6deg);
          transform: rotate(6deg);
}

.mound_spade {
  display: block;
  width: 35px;
  height: 30px;
  position: absolute;
  right: 50%;
  top: 42%;
  margin-right: -250px;
  z-index: 0;
  -webkit-transform: rotate(35deg);
          transform: rotate(35deg);
  background: #dd4040;
}
.mound_spade:before, .mound_spade:after {
  content: '';
  display: block;
  position: absolute;
}
.mound_spade:before {
  width: 40%;
  height: 30px;
  bottom: 98%;
  left: 50%;
  margin-left: -20%;
  background: #dd4040;
}
.mound_spade:after {
  width: 100%;
  height: 30px;
  top: -55px;
  left: 0%;
  box-sizing: border-box;
  border: 10px solid #dd4040;
  border-radius: 4px 4px 20px 20px;
}

</style>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<div class="content-snow">
  <canvas class="snow" id="snow"></canvas>
  <div class="main-text">
    <h1>Страница не найдена<br/></h1><a class="home-link" href="/">вернуться на главную страницу.</a>
  </div>
  <div class="ground">
    <div class="mound"> 
      <div class="mound_text">404</div>
      <div class="mound_spade"></div>
    </div>
  </div>
</div>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<script>
(function() {
	function ready(fn) {
		if (document.readyState != 'loading'){
			fn();
		} else {
			document.addEventListener('DOMContentLoaded', fn);
		}
	}
	
	function makeSnow(el) {
		var ctx = el.getContext('2d');
		var width = 0;
		var height = 0;
		var particles = [];
		
		var Particle = function() {
			this.x = this.y = this.dx = this.dy = 0;
			this.reset();
		}
		
		Particle.prototype.reset = function() {
			this.y = Math.random() * height;
			this.x = Math.random() * width;
			this.dx = (Math.random() * 1) - 0.5;
			this.dy = (Math.random() * 0.5) + 0.5;
		}
		
		function createParticles(count) {
			if (count != particles.length) {
				particles = [];
				for (var i = 0; i < count; i++) {
					particles.push(new Particle());
				}
			}
		}
				
		function onResize() {
			width = window.innerWidth;
			height = window.innerHeight;
			el.width = width;
			el.height = height;
			
			createParticles((width * height) / 10000);
		}
		
		function updateParticles() {
			ctx.clearRect(0, 0, width, height);
			ctx.fillStyle = '#f6f9fa';
			
			particles.forEach(function(particle) {
				particle.y += particle.dy;
				particle.x += particle.dx;
				
				if (particle.y > height) {
					particle.y = 0;
				}
				
				if (particle.x > width) {
					particle.reset();
					particle.y = 0;
				}
				
				ctx.beginPath();
				ctx.arc(particle.x, particle.y, 5, 0, Math.PI * 2, false);
				ctx.fill();
			});
			
			window.requestAnimationFrame(updateParticles);
		}
		
		onResize();
		updateParticles();
		
		window.addEventListener('resize', onResize);
	}
	
	ready(function() {
		var canvas = document.getElementById('snow');
		makeSnow(canvas);
	});
})();
</script>
<?php
get_footer();
