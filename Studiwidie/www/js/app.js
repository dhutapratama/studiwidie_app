// Variable Initialization
var username            = '';
var password            = '';
var logged_in           = window.localStorage.logged_in;
var post_url            = '';
var id_mapel            = '';
var ujian_mapel         = '';
var ujian_mapel_text    = '';
var ujian_seri          = '';
var ujian_hint          = [];
var ujian_hint_number   = 2;
var ujian_nomor         = 0;
var ujian_jawaban       = '';
var jumlah_soal         = 0;
var jawaban             = '';
var counter             = '';
var count               = 1800;
var count_down_time     = 'Initialization';
var first_time_ujian    = true;
var first_time_review   = true;
var first_time_materi   = true;

var api_url = 'http://api.studiwidie.com'; // Production
//var api_url = 'http://api.localhost'; // Production
//var api_url = 'http://api.studiwidie.app'; // Development

$( document ).on( "mobileinit", function() {
    console.log("Studiwidie initialization is started.");
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
    console.log("Studiwidie initialization is ended.");
});

function initialization() {
    var post_url = "/login";
	username = window.localStorage.username;
	password = window.localStorage.password;

	console.log("Login check with saved username & password in the localStorage.");

	$.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            username: username, 
            password: password,
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in === true) {
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
    $( '#belajar_materi-nama' ).html( nama );
    $( '#materi-nama' ).html( nama );
    $( '#ujian-nama' ).html( nama );
    $( '#start_ujian-nama' ).html( nama );
    $( '#progress-nama' ).html( nama );
    $( '#history-nama' ).html( nama );
    $( '#menu-profil-nama' ).html( nama );
    $( '#ubah_profil-nama' ).html( nama );
    $( '#ubah_profil-nama' ).html( nama );
    $( '#about-nama' ).html( nama );
}

function reset_all_input () {
    $( "#login-username" ).val('');
    $( "#login-password" ).val('');
}

function loginRequired() {
    $.mobile.loading( "hide" );

    $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
    $('#ujian-popup').popup('open');

    console.log("Wajib login untuk mengakses halaman ini.");
    setTimeout(function (){
        location.hash = "public-page";
    }, 2000);
}

function resetVarUjian () {
    var ujian_mapel         = '';
    var ujian_mapel_text    = '';
    var ujian_seri          = '';
    var ujian_hint          = [];
    var ujian_nomor         = 0;
    var ujian_jawaban       = '';
    var jumlah_soal         = 0;
    var jawaban             = '';
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

            if(obj.logged_in === false) {
                console.log("Logout berhasil.");

                $('#home-notif').html(obj.notification);
                $('#home-popup').popup('open');

                window.localStorage.username = '';
                window.localStorage.password = '';

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

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in === true) {
                console.log("Login berhasil, username & password disimpan ke localStorage.");

                $('#login-notif').html(obj.notification);
                $('#login-popup').popup('open');

                window.localStorage.username = username;
                window.localStorage.password = password;

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

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in === true) {
                console.log("Registrasi berhasil.");

                $('#login-notif').html(obj.notification);
                $('#login-popup').popup('open');

                window.localStorage.username = username;
                window.localStorage.password = password;

                set_nama( nama );

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

$( document ).on( "vclick", "#refreshHistory", function() {
    refreshHistory();
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

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Mengambil data mata pelajaran.");
                $( '#mapel-belajar' ).html( obj.data.get_mapel );
                $( '#mapel-belajar' ).listview( "refresh" );
                
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

$( document ).on( "vclick", "#open-learning", function() {
    $.mobile.loading( "show" );

    id_mapel = $( this ).data('id_mapel');

    post_url = "/siswa/get_learning";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "materi_learning",
            id_mapel: id_mapel
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Mengambil data learning > id_mapel = " + id_mapel + '.');

                location.hash = 'belajar_materi-page';

                $( '#mapel-belajar_materi' ).html( obj.data.get_learning );
                if (first_time_materi == true) {
                    first_time_materi = false;
                } else {
                    $( '#mapel-belajar_materi' ).listview( "refresh" );
                }
                
            } else {
                $.mobile.loading( "hide" );

                $('#belajar_materi-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#belajar_materi-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#open-materi", function() {
    $.mobile.loading( "show" );

    id = $( this ).data('id_materi');

    post_url = "/siswa/get_materi";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "materi_learning",
            id: id
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Mengambil materi > id = " + id + '.');

                location.hash = 'materi-page';

                $( '#materi-isi' ).html( obj.data.get_materi);
                
            } else {
                $.mobile.loading( "hide" );

                $('#materi-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#materi-popup').popup('open');

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

// --------------------------------- Start ujian Page ---------------------------------

$( document ).on( "pagecreate", "#page-ujian", function() {

    $.mobile.loading( "show" );

    post_url = "/siswa/get_mapel_ujian";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "mata_pelajaran"
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Mengambil data mata pelajaran.");
                $( '#ujian-mapel' ).html( obj.data.get_mapel );
                $( '#ujian-mapel' ).listview( "refresh" );
                
            } else {
                $.mobile.loading( "hide" );

                $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#ujian-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#open-ujian", function() {
    $.mobile.loading( "show" );

    id_mapel = $( this ).data('id_mapel');

    post_url = "/siswa/get_ujian";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "ujian",
            id_mapel: id_mapel
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Mengambil ujian > id_mapel = " + id_mapel + '.');

                if (obj.data.seri == false) {
                    $('#ujian-notif').html("Semua soal ujian " + obj.data.mapel + " telah diselesaikan. Untuk saat ini pilihlah mata pelajaran yang lainnya.");
                    $('#ujian-popup').popup('open');
                } else {
                    ujian_mapel = id_mapel;
                    ujian_seri  = obj.data.seri;

                    location.hash = 'page-start_ujian';
                    $( '#start_ujian-seri' ).html( obj.data.seri);
                    $( '#start_ujian-mapel' ).html( obj.data.mapel);
                    ujian_mapel_text = obj.data.mapel;
                }
            } else {
                $.mobile.loading( "hide" );

                $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#ujian-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#go_ujian", function() {
    $.mobile.loading( "show" );

    ujian_nomor = 0;
    post_url = "/siswa/init_ujian";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "init_ujian",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri,
            nomor_soal: ujian_nomor
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Menginisialisasi ujian dengan seri " + ujian_seri + '.');
                location.hash = 'page-progress';

                jumlah_soal = obj.data.jumlah_soal;
                $('#progress-soal').html(obj.data.soal);
                $('#ans-a').html("A. " + obj.data.jawaban_a);
                $('#ans-b').html("B. " + obj.data.jawaban_b);
                $('#ans-c').html("C. " + obj.data.jawaban_c);
                $('#ans-d').html("D. " + obj.data.jawaban_d);
                $('#ans-e').html("E. " + obj.data.jawaban_e);

                if (first_time_ujian == true) {
                    first_time_ujian = false;
                } else {
                    $('#jawaban-a').prop('checked', false).checkboxradio('refresh');
                    $('#jawaban-b').prop('checked', false).checkboxradio('refresh');
                    $('#jawaban-c').prop('checked', false).checkboxradio('refresh');
                    $('#jawaban-d').prop('checked', false).checkboxradio('refresh');
                    $('#jawaban-e').prop('checked', false).checkboxradio('refresh');
                }

                ujian_hint = [ obj.data.hint_1, obj.data.hint_2, obj.data.hint_3 ];

                count  = 1800;
                counter = setInterval(timer, 1000); //1000 will run it every 1 second
                page_set();

            } else {
                $.mobile.loading( "hide" );

                $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#ujian-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#ujian-next", function() {

    console.log('Next button triggered.');

    if( $('#jawaban-a').is( ":checked" ) == true ) {
        jawaban = 'a';
    } else if( $('#jawaban-b').is( ":checked" ) == true ) {
        jawaban = 'b';
    } else if( $('#jawaban-c').is( ":checked" ) == true ) {
        jawaban = 'c';
    } else if( $('#jawaban-d').is( ":checked" ) == true ) {
        jawaban = 'd';
    } else if( $('#jawaban-e').is( ":checked" ) == true ) {
        jawaban = 'e';
    }

    if( jawaban == '' ) { 
        $('#progress-notif').html("Anda belum memilih jawaban.");
        $('#progress-popup').popup('open');
    } else {
        console.log('Update jawaban di server.');
        update_ujian();
        console.log('Jawaban untuk soal nomor ' + ujian_nomor + ' adalah ' + jawaban + '.');
        ujian_nomor++;
        
        if (ujian_nomor == jumlah_soal) {
            location.hash = "page-finish_ujian";
            console.log('Update jawaban di server.');
            finishUjian();
        } else {
            console.log("Ambil soal ujian dengan seri " + ujian_seri + ' dan nomor array ' + ujian_nomor + '.');
            get_soal();
        }

        // Reset
        page_set();
        jawaban = '';
    }  
});

$( document ).on( "vclick", "#ujian-back", function() {
    console.log('Back button triggered.');

    if ((ujian_nomor + 1) == jumlah_soal) {
        clearInterval(counter);
        location.hash = "page-finish_ujian";
    } else {
        if( $('#jawaban-a').is( ":checked" ) == true ) {
            jawaban = 'a';
        } else if( $('#jawaban-b').is( ":checked" ) == true ) {
            jawaban = 'b';
        } else if( $('#jawaban-c').is( ":checked" ) == true ) {
            jawaban = 'c';
        } else if( $('#jawaban-d').is( ":checked" ) == true ) {
            jawaban = 'd';
        } else if( $('#jawaban-e').is( ":checked" ) == true ) {
            jawaban = 'e';
        }

        if (jawaban != '') {
            console.log('Update jawaban di server.');
            update_ujian();
            console.log('Jawaban untuk soal nomor ' + ujian_nomor + ' adalah ' + jawaban + '.');
        }

        ujian_nomor--;
        console.log("Ambil soal ujian dengan seri " + ujian_seri + ' dan nomor array ' + ujian_nomor + '.');
        get_soal();

        // Reset
        page_set();
        jawaban = '';
    }  
});

$( document ).on( "vclick", "#ujian-hint", function() {
    console.log('Hint trigerred!');
    if(ujian_hint_number == 0) {
        $('#progress-notif').html("Hint telah digunakan.");
        $('#progress-popup').popup('open');
    } else {
        $('#progress-notif').html("Hint : " + ujian_hint[3 - ujian_hint_number]);
        $('#progress-popup').popup('open');
        ujian_hint_number--;
        $('#ujian-hint').html('Bantuan : ' + ujian_hint_number);
    }
});

$( document ).on( "vclick", "#stop-ujian", function() {
    console.log('Ujian diakhiri!');
    clearInterval(counter);
    location.hash = "page-hasil";
    $.mobile.loading( "show" );

    post_url = "/siswa/get_hasil";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "hasil_ujian",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log('Mengambil hasil ujian.');
                location.hash = "page-hasil";
                $('#hasil-mapel').html(obj.data.mata_pelajaran);
                $('#hasil-seri').html(obj.data.no_seri);
                $('#hasil-tanggal').html(obj.data.tanggal);
                $('#hasil-jumlah').html(obj.data.jumlah_soal);
                $('#hasil-benar').html(obj.data.jawaban_benar);
                $('#hasil-salah').html(obj.data.jawaban_salah);
                $('#hasil-nilai').html(obj.data.nilai);
            } else {
                loginRequired();
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

function get_soal() {
    $.mobile.loading( "show" );

    post_url = "/siswa/get_soal";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "update_ujian",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri,
            nomor_soal: ujian_nomor
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log('Update soal di client.');

                $('#progress-soal').html(obj.data.soal);
                $('#ans-a').html("A. " + obj.data.jawaban_a);
                $('#ans-b').html("B. " + obj.data.jawaban_b);
                $('#ans-c').html("C. " + obj.data.jawaban_c);
                $('#ans-d').html("D. " + obj.data.jawaban_d);
                $('#ans-e').html("E. " + obj.data.jawaban_e);

                ujian_hint_number = obj.data.hint;
                $('#ujian-hint').html("Bantuan : " + obj.data.hint);

                ujian_hint = [ obj.data.hint_1, obj.data.hint_2, obj.data.hint_3 ];
                ujian_jawaban = obj.data.jawaban;
                preparePageUjian();
                reset_jawaban();
                
            } else {
                $.mobile.loading( "hide" );

                $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#ujian-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
}

function update_ujian() {
    $.mobile.loading( "show" );

    post_url = "/siswa/update_ujian";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "update_ujian",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri,
            nomor_soal: ujian_nomor,
            jawaban : jawaban,
            hint : ujian_hint_number
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == false) {
                $.mobile.loading( "hide" );

                $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#ujian-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
}

function page_set() {
    console.log('Page reset configuration.');
    //Tombol Back
    if (ujian_nomor > 0) {
        $('#ujian-back').prop('disabled', false);
        $('#ujian-hint').prop('disabled', false);
        $('#ujian-next').prop('disabled', false);
    } else {
        $('#ujian-back').prop('disabled', true);
        $('#ujian-hint').prop('disabled', false);
        $('#ujian-next').prop('disabled', false);
    }

    $('#progress-nomor').html('No.' + (ujian_nomor + 1));
    $('#progress-mapel').html(ujian_mapel_text);
    $('#progress-waktu').html(count_down_time);
}

function preparePageUjian() {
    $('#jawaban-a').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-b').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-c').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-d').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-e').prop('checked', false).checkboxradio('refresh');
}

function reset_jawaban() {
    $('#jawaban-a').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-b').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-c').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-d').prop('checked', false).checkboxradio('refresh');
    $('#jawaban-e').prop('checked', false).checkboxradio('refresh');

    if (ujian_jawaban == 'a') {
        $('#jawaban-a').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'b') {
        $('#jawaban-b').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'c') {
        $('#jawaban-c').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'd') {
        $('#jawaban-d').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'e') {
        $('#jawaban-e').prop('checked', true).checkboxradio('refresh');
    }
}

function timer() {
    
    if (count == 0) {
        // Jika waktu habis.
    } else {
        count = count - 1;
        var seconds = count % 60;
        var minutes = Math.floor(count / 60);
        var hours = Math.floor(minutes / 60);
        minutes %= 60;
        hours %= 60;

        count_down_time = hours + ':' + minutes + ':' + seconds;
        $('#progress-waktu').html(count_down_time);
    }
}

function finishUjian() {
    $( "#finish-mapel" ).html( ujian_mapel_text );
    $( "#finish-seri" ).html( ujian_seri );
}

// --------------------------------- End ujian Page ---------------------------------


// --------------------------------- Start hasil Page ---------------------------------

$( document ).on( "vclick", "#go_review", function() {
    $.mobile.loading( "show" );

    ujian_nomor = 0;
    post_url    = "/siswa/init_review";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "init_review",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri,
            nomor_soal: ujian_nomor
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log("Menginisialisasi review dengan seri " + ujian_seri + '.');
                location.hash = 'page-review';

                jumlah_soal = obj.data.jumlah_soal;
                $('#review-soal').html(obj.data.soal);
                $('#rans-a').html("A. " + obj.data.jawaban_a);
                $('#rans-b').html("B. " + obj.data.jawaban_b);
                $('#rans-c').html("C. " + obj.data.jawaban_c);
                $('#rans-d').html("D. " + obj.data.jawaban_d);
                $('#rans-e').html("E. " + obj.data.jawaban_e);
                $('#kunci-jawaban').html(obj.data.kunci_jawaban);
                $('#review-mapel').html(obj.data.mata_pelajaran);

                if (first_time_review == false) {
                    $('#review-a').prop('checked', false).checkboxradio('refresh');
                    $('#review-b').prop('checked', false).checkboxradio('refresh');
                    $('#review-c').prop('checked', false).checkboxradio('refresh');
                    $('#review-d').prop('checked', false).checkboxradio('refresh');
                    $('#review-e').prop('checked', false).checkboxradio('refresh');
                }

                if (obj.data.jawaban == 'a') {
                    $('#review-a').prop('checked', true);
                } else if(obj.data.jawaban == 'b') {
                    $('#review-b').prop('checked', true);
                } else if(obj.data.jawaban == 'c') {
                    $('#review-c').prop('checked', true);
                } else if(obj.data.jawaban == 'd') {
                    $('#review-d').prop('checked', true);
                } else if(obj.data.jawaban == 'e') {
                    $('#review-e').prop('checked', true);
                }

                review_set();

                if (first_time_review == true) {
                    first_time_review = false;
                } else {
                    $('#review-a').checkboxradio('refresh');
                    $('#review-b').checkboxradio('refresh');
                    $('#review-c').checkboxradio('refresh');
                    $('#review-d').checkboxradio('refresh');
                    $('#review-e').checkboxradio('refresh');
                }

            } else {
                $.mobile.loading( "hide" );

                $('#ujian-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#ujian-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#review-next", function() {

    console.log('Next button triggered.');

    if ((ujian_nomor + 1) == jumlah_soal) {
        location.hash = "page-hasil"; //--------------------------
    } else {
        if( $('#review-a').is( ":checked" ) == true ) {
            jawaban = 'a';
        } else if( $('#review-b').is( ":checked" ) == true ) {
            jawaban = 'b';
        } else if( $('#review-c').is( ":checked" ) == true ) {
            jawaban = 'c';
        } else if( $('#review-d').is( ":checked" ) == true ) {
            jawaban = 'd';
        } else if( $('#review-e').is( ":checked" ) == true ) {
            jawaban = 'e';
        }

        if( jawaban == '' ) { 
            $('#review-notif').html("Anda belum memilih jawaban.");
            $('#review-popup').popup('open');
        } else {
            console.log('Jawaban untuk soal nomor ' + ujian_nomor + ' adalah ' + jawaban + '.');
            ujian_nomor++;
            console.log("Ambil soal ujian dengan seri " + ujian_seri + ' dan nomor array ' + ujian_nomor + '.');
            get_soal_review();

            // Reset
            review_set();
            jawaban = '';
        }
    }  
});

$( document ).on( "vclick", "#review-back", function() {
    console.log('Back button triggered.');
    
    if( $('#review-a').is( ":checked" ) == true ) {
        jawaban = 'a';
    } else if( $('#review-b').is( ":checked" ) === true ) {
        jawaban = 'b';
    } else if( $('#review-c').is( ":checked" ) == true ) {
        jawaban = 'c';
    } else if( $('#review-d').is( ":checked" ) == true ) {
        jawaban = 'd';
    } else if( $('#review-e').is( ":checked" ) == true ) {
        jawaban = 'e';
    }

    ujian_nomor--;
    console.log("Ambil soal ujian dengan seri " + ujian_seri + ' dan nomor array ' + ujian_nomor + '.');
    get_soal_review();

    // Reset
    review_set();
    jawaban = '';
});

function review_set() {
    console.log('Page reset configuration.');
    //Tombol Back
    if (ujian_nomor > 0) {
        $('#review-back').prop('disabled', false);
        $('#review-next').prop('disabled', false);
    } else {
        $('#review-back').prop('disabled', true);
        $('#review-next').prop('disabled', false);
    }
    $('#review-nomor').html('No.' + (ujian_nomor + 1));
}

function get_soal_review() {
    $.mobile.loading( "show" );

    post_url = "/siswa/get_review";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "update_soal_review",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri,
            nomor_soal: ujian_nomor
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log('Update soal di client.');

                $('#review-soal').html(obj.data.soal);
                $('#rans-a').html("A. " + obj.data.jawaban_a);
                $('#rans-b').html("B. " + obj.data.jawaban_b);
                $('#rans-c').html("C. " + obj.data.jawaban_c);
                $('#rans-d').html("D. " + obj.data.jawaban_d);
                $('#rans-e').html("E. " + obj.data.jawaban_e);
                $('#kunci-jawaban').html(obj.data.kunci_jawaban);
                ujian_jawaban = obj.data.jawaban;
                preparePageReview();
                reset_jawaban_review();
                
            } else {
                $.mobile.loading( "hide" );

                $('#review-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#review-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
}

function preparePageReview() {
    $('#review-a').prop('checked', false).checkboxradio('refresh');
    $('#review-b').prop('checked', false).checkboxradio('refresh');
    $('#review-c').prop('checked', false).checkboxradio('refresh');
    $('#review-d').prop('checked', false).checkboxradio('refresh');
    $('#review-e').prop('checked', false).checkboxradio('refresh');
}

function reset_jawaban_review() {
    $('#review-a').prop('checked', false).checkboxradio('refresh');
    $('#review-b').prop('checked', false).checkboxradio('refresh');
    $('#review-c').prop('checked', false).checkboxradio('refresh');
    $('#review-d').prop('checked', false).checkboxradio('refresh');
    $('#review-e').prop('checked', false).checkboxradio('refresh');

    if (ujian_jawaban == 'a') {
        $('#review-a').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'b') {
        $('#review-b').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'c') {
        $('#review-c').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'd') {
        $('#review-d').prop('checked', true).checkboxradio('refresh');
    } else if(ujian_jawaban == 'e') {
        $('#review-e').prop('checked', true).checkboxradio('refresh');
    }
}

// --------------------------------- End hasilsw Page ---------------------------------

// --------------------------------- Start History Page ---------------------------------

$( document ).on( "vclick", "#open-history_nilai", function() {
    $.mobile.loading( "show" );

    ujian_nomor = 0;
    ujian_mapel = $(this).data('id_mapel');
    ujian_seri  = $(this).data('no_seri');

    console.log('Review hasil tryout!');

    post_url = "/siswa/get_hasil";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "hasil_ujian",
            id_mapel: ujian_mapel,
            no_seri: ujian_seri
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log('Mengambil hasil ujian.');
                location.hash = "page-hasil";
                $('#hasil-mapel').html(obj.data.mata_pelajaran);
                $('#hasil-seri').html(obj.data.no_seri);
                $('#hasil-tanggal').html(obj.data.tanggal);
                $('#hasil-jumlah').html(obj.data.jumlah_soal);
                $('#hasil-benar').html(obj.data.jawaban_benar);
                $('#hasil-salah').html(obj.data.jawaban_salah);
                $('#hasil-nilai').html(obj.data.nilai);
            } else {
                loginRequired();
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

function refreshHistory(){
    $.mobile.loading( "show" );

    post_url = "/siswa/get_history";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "get_history_list"
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                console.log('Update history di client.');

                if (obj.data.history == '') {
                    $('#history-tryout').html('<li>Anda belum melakukan tryout.</li>').listview('refresh');
                } else {
                    $('#history-tryout').html(obj.data.history).listview('refresh');
                }

            } else {
                $.mobile.loading( "hide" );

                $('#review-notif').html("Anda harus melakukan login untuk mengakses halaman ini.");
                $('#review-popup').popup('open');

                console.log("Wajib login untuk mengakses halaman ini.");
                setTimeout(function (){
                    location.hash = "public-page";
                }, 2000);
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
}

// --------------------------------- End History Page ---------------------------------

// --------------------------------- Start profil Page ---------------------------------

$( document ).on( "vclick", "#open-profil", function() {
    $.mobile.loading( "show" );

    console.log('Ambil data profil.');

    post_url = "/siswa/get_profil";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "data_profil"
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                $('#profil-username').html(obj.data.username);
                $('#profil-nama').html(obj.data.nama);
                $('#profil-email').html(obj.data.email);

                $('#ubah-username').val(obj.data.username);
                $('#ubah-nama').val(obj.data.nama);
                $('#ubah-email').val(obj.data.email);
            } else {
                loginRequired();
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});

$( document ).on( "vclick", "#ubah-profil", function() {
    $.mobile.loading( "show" );

    console.log('Ambil data profil.');

    post_url = "/siswa/update_profil";

    $.ajax({ type: 'POST', url: api_url + post_url, data: 
        {
            request: "ubah_profil",
            nama: $( "#ubah-nama" ).val(),
            email: $( "#ubah-email" ).val(),
            password: $( "#ubah-password" ).val(),
            passconf: $( "#ubah-passconf" ).val(),
        },

        xhrFields: { withCredentials: true },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            // JSON response
            var obj = jQuery.parseJSON( data );

            if(obj.logged_in == true) {
                $('#ubah_profil-notif').html("Profil berhasil diperbarui.");
                $('#ubah_profil-popup').popup('open');

                set_nama( obj.data.nama );
            } else {
                loginRequired();
            }
        },
        error: function(xhr, textStatus, errorThrown){ network_error(); $.mobile.loading( "hide" ); }
    });
});
// --------------------------------- End profil Page ---------------------------------