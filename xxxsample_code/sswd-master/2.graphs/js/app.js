$(function(){
	$.ajax({
    	url: 'data.php', 

    	error: function() {
        	alert("Unable to call: data.php", "error");
    	},

        success: function(data) {	         
			var options = {
  				width: 300,
  				height: 200,
  				showArea: true,
  				low: 0  				
  			};
			new Chartist.Line('.ct-chart', data, options);       
        }
	});	
});