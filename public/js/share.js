
	jQuery(document).ready(function() {
		
		"use strict";
		
		// GO TO TOP SETTING
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').fadeIn(duration);
			} else {
				jQuery('.back-to-top').fadeOut(duration);
			}
		});
		
		jQuery('.back-to-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
		
		// SOCIAL SHARE BUTTON
		$('#shareme').sharrre({
		  share: {
			twitter: true,
			facebook: true,
			googlePlus: true
		  },
		  template: '<div class="box"><h4 class="share-this">Share This</h4><a href="#" class="facebook"><img src="/public/images/facebook-share.png" alt="facebook" /></a><a href="#" class="twitter"><img src="/public/images/twitter-share.png" alt="tweet" /></a><a href="#" class="googleplus"><img src="/public/images/googleplus-share.png" alt="google plus" /></a></div>',
		  enableHover: false,
		  enableTracking: true,
		  render: function(api, options){
			  $(api.element).on('click', '.twitter', function() {
				api.openPopup('twitter');
			  });
			  $(api.element).on('click', '.facebook', function() {
				api.openPopup('facebook');
			  });
			  $(api.element).on('click', '.googleplus', function() {
				api.openPopup('googlePlus');
			  });
			}
		});
	});
