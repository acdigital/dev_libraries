<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
	<head>
	 	<!-- Include support librarys first -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
		<script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>		
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		
		<script type="text/javascript">
			//This example uses the javascript sdk to login before embedding the swf
			
			var APP_ID = "140471826021534";			
			var REDIRECT_URI = "http://dev.viok.me/facebook/visualconnection/";		
									
			var PERMS = "email,publish_stream,offline_access,read_stream"; //comma separated list of extended permissions
			
			function init() {
				FB.init({appId:APP_ID, status: true, cookie: true});
				FB.getLoginStatus(handleLoginStatus);
			}
			
			function handleLoginStatus(response) {
				if (response.session) { //Show the SWF										
										
					//A 'name' attribute with the same value as the 'id' is REQUIRED for Chrome/Mozilla browsers
					swfobject.embedSWF("YOUR_SWF.swf?<? echo(time()) ?>", "flashContent", "650", "700", "9.0", null, null, null, {name:"flashContent"});
					
				} else { //ask the user to login					
				 	
					var params = window.location.toString().slice(window.location.toString().indexOf('?'));					
					top.location = 'https://graph.facebook.com/oauth/authorize?client_id='+APP_ID+'&scope='+PERMS+'&redirect_uri='+REDIRECT_URI+params;										
					
				}
			}
			$(init);
		</script>
  </head>
<body>
	<div id="fb-root"></div><!-- required div -->
	<div id="flashContent">
		<h1>You need at least Flash Player 9.0 to view this page.</h1>
		<p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
	</div>  	
</body>
</html>