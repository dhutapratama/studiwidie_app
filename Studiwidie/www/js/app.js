// Variable Initialization
var username = '';
var password = '';
//var api_url = 'http://api.studiwidie.com'; // Production
var api_url = 'http://api.studiwidie.app'; // Development

console.log("Initialization is ready");

function initialization() {
	username = window.localStorage["username"];
	password = window.localStorage["password"];
	console.log("Login");

	$.ajax({ type: 'POST', url: api_url, data: 
        {
            username: username, 
            password: password,
        },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            if(obj.login == "true") {
                location.hash = "utama-page";
            } else {
            	location.hash = "notloggedin-page";
            }
        },
        error: function(xhr, textStatus, errorThrown){
        }
    });
}

initialization();