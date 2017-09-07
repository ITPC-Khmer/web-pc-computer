var Contact = function () {

    return {
        //main function to initiate the module
        init: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#gmapbg',
				lat: 11.570248,
				lng: 104.853820
			  });
			   var marker = map.addMarker({
		            lat: 11.570248,
					lng: 104.853820,
		            title: 'Loop, Inc.',
		            infoWindow: {
		                content: "<b>KHIEV-SAM-ANG-TRADING-CO.,LTD</b> #137B, ST 2011, Sangkat Phnom Penh Thmey,<br>Khan Senen Sok, Phnom Penh, Cambodia."
		            }
		        });

			   marker.infoWindow.open(map, marker);
			});
        }
    };

}();

jQuery(document).ready(function() {    
   Contact.init(); 
});
