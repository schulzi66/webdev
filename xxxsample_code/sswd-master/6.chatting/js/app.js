$(function(){
	
	$("#save").click(function() {
		var username = $("#username").val();
		var message = $("#message").val();

		$.ajax({
        	url: 'controller.php', 
        	data: 'action=add&username='+username+"&message="+message,        	

        	error: function() {
            	logger("Unable to call: controller.php", "error");
        	},

	        success:function(data) {
	            $("#username").attr("disabled", "disabled");
	            $("#message").val("");
	        }
    	});
	});

	$("#wipe").click(function() {
		var username = $("#username").val();

		$.ajax({
        	url: 'controller.php', 
        	data: 'action=wipe&username='+username,        	

        	error: function() {
            	logger("Unable to call: controller.php", "error");
        	},

	        success:function(data) {	            
	        }
    	});
	});

	setInterval(function(){
		$.ajax({
        	url: 'controller.php', 
        	data: 'action=all',        	

        	error: function() {
            	logger("Unable to call: controller.php", "error");
        	},

	        success:function(data) {
	            $('table tbody').html(data);
	        }
    	});

	}, 3000);
});