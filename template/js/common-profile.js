$(function() {

	//SVG Fallback
	if(!Modernizr.svg) {
		$("img[src*='svg']").attr("src", function() {
			return $(this).attr("src").replace(".svg", ".png");
		});
	};

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });

	//волны
	Waves.init();
	Waves.attach('.waves', ['waves-light']);
	Waves.attach('.btn-flat', ['waves-button']);

	//автоматическое изменение размера у textarea
	$(function(){
		$('textarea').autosize();
	});

	//календарь
	$('.datepicker').datepicker({
		weekStart:1,
		format: 'dd.mm.yyyy'
	});

	//аккордион
	$('.accordion-header').on('click', function (e) {

		var $this = $(this);

		$this.parent('.accordion').toggleClass('expanded');
		$this.next('.accordion-collapse').slideToggle( "slow" );
		$this.parent('.accordion').siblings('.accordion').removeClass('expanded').find('.accordion-collapse').slideUp( "slow" );
		e.stopPropagation();
	});

	//табы
	$('ul.tabs__caption').on('click', 'li:not(.active)', function() {
	    $(this)
	      .addClass('active').siblings().removeClass('active')
	      .closest('div.tabs').find('div.tabs__content').removeClass('active').eq($(this).index()).addClass('active');
	});


	// $(window).scroll(function() {
	// 	var page_w = $("html").width();

	// 	if(page_w > 992) {
	// 		var $breadcrumbs = $(".block-scroll-y .breadcrumbs");
	// 		var $title = $(".block-scroll-y .page-title");
	// 		var $posBread = $breadcrumbs.offset().top;
	// 		var $posTitle = $title.offset().top;
	// 		var $bodyScroll = $("body").scrollTop();

	// 		if($bodyScroll >= 110){
	// 			$breadcrumbs.fadeOut();
	// 		}
	// 		else {
	// 			$breadcrumbs.fadeIn();
	// 		}
	// 		if($bodyScroll >= 50) {
	// 			$title.fadeOut();
	// 		}
	// 		else {
	// 			$title.fadeIn();
	// 		}
	// 	}
	// 	else {
	// 		return false;
	// 	}
	// });
});