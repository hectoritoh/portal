$(function () {
	
	Application.init ();
	
});



var Application = function () {
	
	var validationRules = getValidationRules ();
	
	return { init: init, validationRules: validationRules };
	
	function init () {
		
		enableBackToTop ();
		enableLightbox ();
		enableCirque ();
		enableEnhancedAccordion ();


		$('.ui-tooltip').tooltip();
	    $('.ui-popover').popover();
    

	}

	function enableCirque () {
		if ($.fn.lightbox) {
			$('.ui-lightbox').lightbox ();
		}
	}

	function enableLightbox () {
		if ($.fn.cirque) {
			$('.ui-cirque').cirque ({  });
		}
	}

	function enableBackToTop () {
		var backToTop = $('<a>', { id: 'back-to-top', href: '#top' });
		var icon = $('<i>', { class: 'icon-chevron-up' });

		backToTop.appendTo ('body');
		icon.appendTo (backToTop);
		
	    backToTop.hide();

	    $(window).scroll(function () {
	        if ($(this).scrollTop() > 150) {
	            backToTop.fadeIn ();
	        } else {
	            backToTop.fadeOut ();
	        }
	    });

	    backToTop.click (function (e) {
	    	e.preventDefault ();

	        $('body, html').animate({
	            scrollTop: 0
	        }, 600);
	    });
	}
	
	function enableEnhancedAccordion () {
		$('.accordion-toggle').on('click', function (e) {			
	         $(e.target).parent ().parent ().parent ().addClass('open');
	    });
	
	    $('.accordion-toggle').on('click', function (e) {
	        $(this).parents ('.panel').siblings ().removeClass ('open');
	    });
	    
	}
	
	function getValidationRules () {
		var custom = {
	    	focusCleanup: false,
			
			wrapper: 'div',
			errorElement: 'span',
			
			highlight: function(element) {
				$(element).parents ('.form-group').removeClass ('success').addClass('error');
			},
			success: function(element) {
				$(element).parents ('.form-group').removeClass ('error').addClass('success');
				$(element).parents ('.form-group:not(:has(.clean))').find ('div:last').before ('<div class="clean"></div>');
			},
			errorPlacement: function(error, element) {
				error.prependTo(element.parents ('.form-group'));
			}
	    	
	    };
	    
	    return custom;
	}
	
}();
$(function () {
	// we use an inline data source in the example, usually data would
	// be fetched from a server
	var data = [], totalPoints = 200;
	function getRandomData() {
		if (data.length > 0)
			data = data.slice(1);

		while (data.length < totalPoints) {
			var prev = data.length > 0 ? data[data.length - 1] : 50;
			var y = prev + Math.random() * 10 - 5;
			if (y < 0)
				y = 0;
			if (y > 100)
				y = 100;
			data.push(y);
		}

		var res = [];
		for (var i = 0; i < data.length; ++i)
			res.push([i, data[i]])
		return res;
	}

	// setup plot
	var options = {
		yaxis: { min: 0, max: 100 },
		xaxis: { min: 0, max: 100 },
		colors: ["#F90", "#222", "#666", "#BBB"],
		series: {
				   lines: { 
						lineWidth: 2, 
						fill: true,
						fillColor: { colors: [ { opacity: 0.6 }, { opacity: 0.2 } ] },
						steps: false

					}
			   }
	};
	
	var plot = $.plot($("#area-chart"), [ getRandomData() ], options);
});
$(function () {

	var data = [];
	var series = 3;
	for( var i = 0; i<series; i++)
	{
		data[i] = { label: "Series "+(i+1), data: Math.floor(Math.random()*100)+1 }
	}

	$.plot($("#donut-chart"), data,
	{
		colors: ["#F90", "#222", "#777", "#AAA"],
	        series: {
	            pie: { 
	                innerRadius: 0.5,
	                show: true
	            }
	        }
	});
	
});