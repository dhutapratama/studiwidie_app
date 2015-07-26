// Variable Initialization
var username = '';
var password = '';
var logged_in = window.localStorage["logged_in"];
var post_url = "";
//var api_url = 'http://api.studiwidie.com'; // Production
var api_url = 'http://api.studiwidie.app'; // Development

$( document ).on( "mobileinit", function() {
    console.log("Studiwidie initialization is started");
    $.mobile.loader.prototype.options.text = "Menghubungkan Jaringan...";
    $.mobile.loader.prototype.options.textVisible = true;
    $.mobile.loader.prototype.options.theme = "b";
    $.mobile.loader.prototype.options.html = "";

    $(document).bind('keydown', function(event) {   
        if (event.keyCode == 27) { // 27 = 'Escape' keyCode (back button)
                event.preventDefault();
            }
    });

    initialization();
    console.log("Studiwidie initialization is ended");
});

function initialization() {
    var post_url = "/login";
	username = window.localStorage["username"];
	password = window.localStorage["password"];

	console.log("Login check with saved username & password in the localStorage");

	$.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            username: username, 
            password: password,
        },
        
        success: function(data, textStatus ){
            
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Login berhasil, username & password localStorage benar.");

                set_nama(obj.nama);

                setTimeout(function (){
                    location.hash = "home-page";
                }, 2000);
            } else {
                console.log("Login gagal, username & password di localStorage salah.");

                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){
            console.log("Network error");
            location.hash = "network-error";
        }
    });
} 

function ExitApp() {
    navigator.app.exitApp();
}

$( document ).on( "vclick", "#exitApp", function() {
    console.log("Exiting applications.");
    ExitApp();
});

function network_error() {
    console.log("Network error");
    location.hash = "network-error";
}

function set_nama( nama ) {
    $( '#home-nama' ).html( nama );
    $( '#belajar-nama' ).html( nama );
}

function reset_all_input () {
    $( "#login-username" ).val('');
    $( "#login-password" ).val('');
}

// Logout
$( document ).on( "vclick", "#logout", function() {
    $.mobile.loading( "show" );

    post_url = "/login/logout";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "logout"
        },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == false) {
                console.log("Logout berhasil.");

                $('#home-notif').html(obj.notification);
                $('#home-popup').popup('open');

                window.localStorage["username"] = '';
                window.localStorage["password"] = '';

                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
                
            } else {
                $.mobile.loading( "hide" );

                $('#home-notif').html(obj.notification);
                $('#home-popup').popup('open');

                console.log("Logout gagal, server mengalami masalah.");
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});    

// --------------------------------- Start Login Page ---------------------------------

$( document ).on( "vclick", "#login-button", function() {
    $.mobile.loading( "show" );

    post_url = "/login";
    username = $( "#login-username" ).val();
    password = $( "#login-password" ).val();

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            username: username, 
            password: password,
        },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Login berhasil, username & password disimpan ke localStorage.");

                $('#login-notif').html(obj.notification);
                $('#login-popup').popup('open');

                window.localStorage["username"] = username;
                window.localStorage["password"] = password;

                set_nama(obj.nama);
                reset_all_input();

                setTimeout(function (){
                    location.hash = "home-page";
                }, 2000);
                
            } else {
                $.mobile.loading( "hide" );

                $('#login-notif').html(obj.notification);
                $('#login-popup').popup('open');

                console.log("Login gagal, username & password salah.");
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#register-button", function() {
    $.mobile.loading( "show" );

    post_url = "/login/register";
    nama     = $( "#daftar-nama" ).val();
    email    = $( "#daftar-email" ).val();
    username = $( "#daftar-username" ).val();
    password = $( "#daftar-password" ).val();
    passconf = $( "#daftar-passconf" ).val();

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            nama: nama, 
            email: email,
            username: username, 
            password: password,
            passconf: passconf,
        },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Registrasi berhasil.");

                $('#login-notif').html(obj.notification);
                $('#login-popup').popup('open');

                window.localStorage["username"] = username;
                window.localStorage["password"] = password;

                setTimeout(function (){
                    location.hash = "home-page";
                }, 2000);
                
            } else {
                $.mobile.loading( "hide" );

                $('#login-notif').html(obj.notification);
                $('#login-popup').popup('open');

                console.log("Registrasi gagal, " . obj.notification);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

// --------------------------------- End Login Page ---------------------------------

// --------------------------------- Start Home Page ---------------------------------

$( document ).on( "pagecreate", "#home-page", function() {
});

// --------------------------------- End home Page ---------------------------------

// --------------------------------- Start belajar Page ---------------------------------

$( document ).on( "pagecreate", "#belajar-page", function() {
    $.mobile.loading( "show" );

    post_url = "/siswa/get_mapel";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "mata_pelajaran"
        },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Mengambil data mata pelajaran.");

                $('#mapel-belajar').html( obj.data.get_mapel );
                
            } else {
                $.mobile.loading( "hide" );

                $('#belajar-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#belajar-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

// --------------------------------- End belajar Page ---------------------------------