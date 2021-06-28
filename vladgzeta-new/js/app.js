
import $ from 'jquery'
import gsap from 'gsap'

window.jQuery = $
window.$ = $

require('../libs/jquery/jquery.min.js')
require('../libs/slick/slick.min.js')
require('lightbox2')
require('../libs/owl.carousel/owl.carousel.min.js')
require('../libs/jquery.formstyler/jquery.customSelect.min.js')
require('jquery-mousewheel')
require('../libs/perfect.scroll/jquery.mCustomScrollbar.concat.min.js')
require('../libs/mmenu/jquery.mmenu.all.min.js')

jQuery(function () {
  $(document).on('keydown',function (e) {
		if ((e.ctrlKey && e.keyCode == 13) || (e.metaKey && e.keyCode == 13)) {
			e.preventDefault();
			let data = {location: '', text: '', action: 'error_in_the_text'};
		    if (window.getSelection) {
          data.text = window.getSelection().toString();
          data.location = window.location.href
		    } else if (document.selection && document.selection.type != "Control") {
          data.text = document.selection.createRange().text;
          data.location = window.location.href
		    }
		    if(data.text!==''){
		    	$.ajax({
		    		url: '/molly/molly.submit.php',
		    		type: 'post',
		    		data: data,
            beforeSend: function() {
              alert('Отправить сообщение об ошибке?')
            },
            success: function() {
              alert('Cообщение об ошибке доставлено, спасибо, что читаете нас!')
            },
            error: function (err) {
              console.error(err);
            }
		    	});
		    }
		}
	});
  function cardSlideIn(){
      var tl = gsap.TimelineMax()
      tl.to([cardContent,firstCard],.3, {transformOrigin:"50% 50%",opacity:0,scale:"+= .15",y: +30},'cardStart')
        .to(secondCard,1, {transformOrigin:"50% 50%",opacity:1,scale:"+= .15",y: 0},'cardStart')
        .to(thirdCard,1, {transformOrigin:"50% 50%",opacity:"+= .2",scale:"+= .1",y:'+=20'},'cardStart')
        .to(fourthCard,1, {transformOrigin:"50% 50%",opacity:"+= .2",scale:"+= .1",y: "+=15"},'cardStart')
        .to(cardContentClone,1, {transformOrigin:"50% 50%",opacity:1,scale:"+= .1",y: 0},'cardStart')
      return tl;
  }
  function card_initialize(){
    let len = $('.home-banner li').length;
    let top = -10;
    $('.home-banner li').each(function(){
      top = top - 10;
      $(this).css({"top": `${top}px`, "z-index":len});
      len--;
    })
  }
  $(document).on('click','.next-card', function(){
    let temp = $(this).parents('li').clone();
    let ind = $(this).parents('li').index();
    $(this).parents('li').addClass('drop');
    setTimeout(function(){
      $('.home-banner li').eq(ind).remove();
    },500);
    setTimeout(function(){
      $('.home-banner').append(temp);
      $('.home-banner li').find('button').prop('disabled','disabled');
       $('.home-banner li').eq(0).find('button').prop('disabled','');
      card_initialize();
    },505)
  })
  
  card_initialize();

  function responseMenu(){
    $('ul.dropdown-menu li.menu-item').appendTo('ul.menu');
    var items = $('ul.menu li.menu-item');
    var max_width = $('ul.menu').width() - $('ul.menu li.dd_menu').outerWidth() - 100;
    var width = 0;
    var hide_from = 0;
    items.each(function(index){
      if (width + $(this).outerWidth() > max_width)
      {
        return false;
      }
      else
      {
        hide_from = index;
        width += $(this).outerWidth();
      }
    });
    if (hide_from < items.length - 1) {
      items.eq(hide_from).nextAll('li.menu-item').appendTo('ul.dropdown-menu');
      $('ul.menu li.dd_menu').show();
    }
    else
    {
      $('ul.menu li.dd_menu').hide();
    }
    $('ul.menu li.dd_menu .dropdown-toggle').attr('count', $('ul.dropdown-menu').children('li').length)
  }
  
  $(document).ready(function () {
    $('.top_menu').on('click', '.dropdown-toggle', function () {
      $('.dropdown-menu').toggle();
      $('.dropdown-toggle').toggleClass('active')
    });
  
    $(window).on('resize', function(){
      responseMenu();
    }).trigger('resize');
  
  });
  function getHotNews() {
    let url = $('.home-banner').data('action')
    console.log('url', url);
    $.ajax({
      type: "GET",
      url: url,
      data: $(this).serialize(),
      beforeSend: function () {
        
      },
      complete: function () {
        
      },
      success: function (res) {
        console.log(res)
      },
      error: function (err) {
        console.error(err);
      }
    });
  }
  $('.sb-icon-search').on('click', function(){
    $(this).toggleClass('active')
    let fa = $(this).find('i.fa')
    if($(this).hasClass('active')){
      $('#sb-search').addClass('sb-search-open')
      $(fa).removeClass('fa-search')
      $(fa).addClass('fa-times')
    }else{
      $('#sb-search').removeClass('sb-search-open')
      $(fa).removeClass('fa-times')
      $(fa).addClass('fa-search')
    }
    
  })
  // setInterval(()=>{
  //   getHotNews()
  // }, 10000)
  //tabs
  $(window).on("load", function () {
    $(".tabs > li:last-child").removeClass("active");
    $(".tab__content > li:last-child").removeClass("active");
    $(".tab__content > li:last-child").removeAttr("style")
  });
  // Variables
  var clickedTab = $(".tabs > .active");
  var tabWrapper = $(".tab__content");
  var activeTab = tabWrapper.find(".active");
  var activeTabHeight = activeTab.outerHeight();

  // Show tab on page load
  activeTab.show();

  // Set height of wrapper on page load
  tabWrapper.height(activeTabHeight);

  $(".tabs > li").on("click", function () {

    // Remove class from active tab
    $(".tabs > li").removeClass("active");

    // Add class active to clicked tab
    $(this).addClass("active");

    // Update clickedTab variable
    clickedTab = $(".tabs .active");

    // fade out active tab
    activeTab.fadeOut(250, function () {

      // Remove active class all tabs
      $(".tab__content > li").removeClass("active");

      // Get index of clicked tab
      var clickedTabIndex = clickedTab.index();

      // Add class active to corresponding tab
      $(".tab__content > li").eq(clickedTabIndex).addClass("active");

      // update new active tab
      activeTab = $(".tab__content > .active");

      // Update variable
      activeTabHeight = activeTab.outerHeight();

      // Animate height of wrapper to new tab height
      tabWrapper.stop().delay(50).animate({
        height: activeTabHeight
      }, 500, function () {

        // Fade in active tab
        activeTab.delay(50).fadeIn(250);

      });
    });
  });
  // custom scroll
  $(window).on("load", function () {
    $.mCustomScrollbar.defaults.scrollButtons.enable = true;
    $(".news-lent").mCustomScrollbar({ theme: "dark-thick" });
  });
  // slider
  $('.big-slider').owlCarousel({
    loop: true, //Зацикливаем слайдер
    items: 1,
    margin: 50, //Отступ от элемента справа в 50px
    nav: true, //Отключение навигации
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    autoplay: true, //Автозапуск слайдера
    dots: true, //Точки навигации
    smartSpeed: 800, //Время движения слайда
    autoplayTimeout: 4500, //Время смены слайда
    responsive: { //Адаптивность. Кол-во выводимых элементов при определенной ширине.
      0: {
        items: 1
      },
    }
  });
  //lezi laod
  $('body').on('click', '#loadmore_gs', function () {
    $(this).text('Загрузка...');
    var data = {
      'action': 'loadmore',
      'query': true_posts,
      'page': current_page
    };
    $.ajax({
      url: ajaxurl,
      data: data,
      type: 'POST',
      success: function (data) {
        if (data) {
          $('#loadmore_gs').text('Показать еще').before(data);
          current_page++;
          if (current_page == max_pages) $("#loadmore_gs").remove();
        } else {
          $('#loadmore_gs').remove();
        }
      }
    });
  });
  //header nav
  $(".navToggle").click(function () {
    $(".dop-menu").toggleClass("open");
  });
  //top scroll
  $(window).scroll(function () {
    if ($(this).scrollTop() != 0) {
      $('#toTop').fadeIn();
    } else {
      $('#toTop').fadeOut();
    }
  });
  $('#toTop').click(function () {
    $('body,html').animate({ scrollTop: 0 }, 800);
  });
  // form styler    
  $('#qtranxs_select_qtranslate-2-chooser, #archives-dropdown-2, select').customSelect();
  //mmenu
  $(".sf-menu").after("<div id='my-menu'>").clone().appendTo("#my-menu");
  $("#my-menu").find("*").attr("style", "");
  $("#my-menu").children("ul").removeClass("sf-menu")
    .parent().mmenu({
      "navbars": [
        {
          "position": "top",
          "content": [
          ]
        },
        {
          "position": "bottom",
          "content": [
            "<a class='fa fa-envelope' href='#/'></a>",
            "<a class='fa fa-twitter' href='#/'></a>",
            "<a class='fa fa-facebook' href='#/'></a>"
          ]
        }
      ],
      extensions: ['theme-light', 'effect-menu-slide', 'pagedim-black', 'fx-menu-zoom', 'fx-listitems-slide',], "(min-width: 800px)": ["widescreen"],
      searchfield: false,
      counters: true,
      navbar: {
        title: '<p>МЕНЮ</p>'
      },
      offCanvas: {
        position: 'left'
      }
    });
  var api = $('#my-menu').data('mmenu');
  // api.bind('open:finish', function(){
  //   $('.hamburger').addClass('is-active');
  // });
  // api.bind('close:finish', function(){
  //   $('.hamburger').removeClass('is-active');
  // });
  $(".toggle-mnu").click(function () {
    $(this).addClass("on");
  });

  var api = $("#mobile-menu").data("mmenu");
  // api.bind("closed", function () {
  //   $(".toggle-mnu").removeClass("on");
  // });
  //lightbox
  // lightbox.option({
  //   'resizeDuration': 200,
  //   'wrapAround': true
  // });

});
var Share = {
  vkontakte: function (purl, ptitle, pimg, text) {
    let url = 'http://vkontakte.ru/share.php?';
    url += 'url=' + encodeURIComponent(purl);
    url += '&title=' + encodeURIComponent(ptitle);
    url += '&description=' + encodeURIComponent(text);
    url += '&image=' + encodeURIComponent(pimg);
    url += '&noparse=true';
    Share.popup(url);
  },
  odnoklassniki: function (purl, text) {
    let url = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
    url += '&st.comments=' + encodeURIComponent(text);
    url += '&st._surl=' + encodeURIComponent(purl);
    Share.popup(url);
  },
  facebook: function (purl, ptitle, pimg, text) {
    let url = 'http://www.facebook.com/sharer.php?s=100';
    url += '&p[title]=' + encodeURIComponent(ptitle);
    url += '&p[summary]=' + encodeURIComponent(text);
    url += '&p[url]=' + encodeURIComponent(purl);
    url += '&p[images][0]=' + encodeURIComponent(pimg);
    Share.popup(url);
  },
  twitter: function (purl, ptitle) {
    let url = 'http://twitter.com/share?';
    url += 'text=' + encodeURIComponent(ptitle);
    url += '&url=' + encodeURIComponent(purl);
    url += '&counturl=' + encodeURIComponent(purl);
    Share.popup(url);
  },
  mailru: function (purl, ptitle, pimg, text) {
    let url = 'http://connect.mail.ru/share?';
    url += 'url=' + encodeURIComponent(purl);
    url += '&title=' + encodeURIComponent(ptitle);
    url += '&description=' + encodeURIComponent(text);
    url += '&imageurl=' + encodeURIComponent(pimg);
    Share.popup(url)
  },

  popup: function (url) {
    window.open(url, '', 'toolbar=0,status=0,width=626,height=436');
  }
};
