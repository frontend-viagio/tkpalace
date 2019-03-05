$(document).ready(function () {

	if ($('.head_boxsearch').length) {
		$('.head_boxsearch').click(function () {
			MobileBoxSearch();
		});
	}
	if($('.row-lightgallery').length){
        	 $('.row-lightgallery').each(function(){
            $(this).lightGallery();
          });
        }
	$(window).scroll(function () {
		if ($(window).width() > 992) {
			var iScrollTop = $(window).scrollTop() / 2;
			if ($(window).scrollTop() < $(window).height()) {
				$('#flexslider-head .slides img').css('transform', 'translate(0px, ' + iScrollTop + 'px)');
			}
		}
	})

	$('#flexslider-head').flexslider({
		animation: "fade",


		start: function (slider) {
			fullScreen();
		}
	});


	$(window).resize(function () {

		fullScreen();
	});

	if($(".lightgallery").length){
        $(".lightgallery").lightGallery({
					 selector: '.item'
		});
	}

});


function fullScreen() {
	var iHeight = $(window).height();
	//                                   iHeight = iHeight - 123;
	if ($('#flexslider-head .slides img').length > 0) {
		var iPic = $($('#flexslider-head .slides img')[0]).height();
		if (iPic < iHeight) {
			iHeight = iPic;
		}
	}
	$('.fix-height').height(iHeight);
}



(function () {

	// store the slider in a local variable
	var $window = $(window),
		flexslider = {
			vars: {}
		};

	// tiny helper function to add breakpoints
	function getGridSize() {
		return (window.innerWidth < 600) ? 1 :
			(window.innerWidth < 900) ? 2 : 3;
	}


	$window.load(function () {
		$('.flexslider_rooms').flexslider({
			animation: "slide",
			itemWidth: 310,
			itemMargin: 50,
			controlNav: false,
			controlsContainer: $(".custom-controls-container"),
			customDirectionNav: $(".custom-navigation a"),
			minItems: getGridSize(), // use function to pull in initial value
			maxItems: getGridSize() // use function to pull in initial value
		});
	});

	// check grid size on resize event
	$window.resize(function () {
		var gridSize = getGridSize();

		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});
}());



(function () {

	// store the slider in a local variable
	var $window = $(window),
		flexslider = {
			vars: {}
		};

	// tiny helper function to add breakpoints
	function getGridSize() {
		return (window.innerWidth < 600) ? 1 :
			(window.innerWidth < 900) ? 3 : 5;
	}


	$window.load(function () {
		$('.flexslider_facilities').flexslider({
			animation: "slide",
			itemWidth: 310,
			itemMargin: 50,
			controlNav: false,
			controlsContainer: $(".custom-controls-container"),
			customDirectionNav: $(".custom-navigation a"),
			minItems: getGridSize(), // use function to pull in initial value
			maxItems: getGridSize() // use function to pull in initial value
		});
	});

	// check grid size on resize event
	$window.resize(function () {
		var gridSize = getGridSize();

		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});
}());

(function () {

	// store the slider in a local variable
	var $window = $(window),
		flexslider = {
			vars: {}
		};

	// tiny helper function to add breakpoints
	function getGridSize() {
		return (window.innerWidth < 600) ? 1 :
			(window.innerWidth < 900) ? 2 : 4;
	}


	$window.load(function () {
		$('.flexslider_service').flexslider({
			animation: "slide",
			itemWidth: 310,
			itemMargin: 20,
			controlNav: false,
			controlsContainer: $(".custom-controls-container"),
			customDirectionNav: $(".custom-navigation a"),
			minItems: getGridSize(), // use function to pull in initial value
			maxItems: getGridSize() // use function to pull in initial value
		});
	});

	// check grid size on resize event
	$window.resize(function () {
		var gridSize = getGridSize();

		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});
}());

function MobileBoxSearch() {
	var iHeight = $(window).height();
	iHeight = iHeight - 50;
	if ($(".open_boxsearch").length > 0) {
		$("body").height('');
		$("body").removeClass("open_boxsearch");
		$('.head_boxsearch').html('<i class="fa fa-calendar" aria-hidden="true"></i> Reservation Now');
		$(".online_reservation").animate({
			top: iHeight,

		}, {
			duration: 700,
			complete: function () {
				$(".online_reservation").attr('style', '');
			}
		});
	} else {
		$("body").addClass("open_boxsearch");
		$("body").height(iHeight);
		$('.head_boxsearch').html('<i class="fa fa-times-circle-o" aria-hidden="true"></i> Close');
		$(".online_reservation").attr('style', 'top:' + iHeight + 'px;');
		$(".online_reservation").animate({
			top: 0

		}, {
			duration: 700
		});
		$('.open_boxsearch  #btnBook').click(function () {
			MobileBoxSearch();
		});
	}
}
