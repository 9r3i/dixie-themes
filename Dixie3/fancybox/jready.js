		(function($){
			$(document).ready(function(){
				$("a[rel=gallery_fancybox]").fancybox({
					'transitionIn'		: 'elastic',
					'transitionOut'		: 'elastic',
					'titlePosition' 	: 'inside',
					'speedIn'					:	500, 
					'speedOut'				:	300,
					'titleFormat'			: function(title, currentArray, currentIndex, currentOpts) {
						return '<span id="fancybox-title-inside">' + (title.length ? title + '<br />' : '') + 'Image ' + (currentIndex + 1) + ' / ' + currentArray.length + '</span>';
					}				});
			});
		})(jQuery);
	