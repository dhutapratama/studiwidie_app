function onAppReady() {
    if( navigator.splashscreen && navigator.splashscreen.hide ) {   // Cordova API detected
        navigator.splashscreen.hide() ;
    }
    
    // inisialisasi pada saat aplikasi berhasil startup
    cekLogin();
    mataPelajaran();
    console.log("Studiwidie is Ready");
}

// Menjalankan function onAppReady saat aplikasi berjalan
document.addEventListener("app.Ready", onAppReady, false) ;


// Cek login
var username = window.localStorage["username"];
var password = window.localStorage["password"];
var origurl = "http://studiwidie.app/";

function cekLogin() {
    if((username != undefined && username != "") && (password != undefined && password != "")) {
        var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" );
        html = $this.jqmData( "html" ) || "";
        $.mobile.loading( "show", {
                text: msgText,
                textVisible: textVisible,
                theme: theme,
                textonly: textonly,
                html: html
        });
    
      $( "#login-form" ).slideUp( "slow" );
      $( "#login-text-1" ).show( "slow" );
      $( "#login-text-1" ).html( "Sedang bekerja..." );
    
    var url = origurl + "login/index/" + username + "/" + password;
    
    $.ajax({
        type: 'POST',
        url: url,
        timeout: 5000,
        data: 
        {
            username: username, 
            password: password,
        },
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            if(obj.login == "true") {
                $('[id="nama-user"]').each(function() {
                    $(this).html( obj.nama );
                });
                $( "#login-form" ).show( "slow" );
                $( "#login-text-1" ).hide();
                //$( "#login-text-1" ).html( "Login berhasil!" );
                location.hash = "utama-page";
            } else {
                $( "#login-text-1" ).html( obj.pesan );
                $( "#login-form" ).show( "slow" );
            }


        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            $( "#login-text-1" ).html( "Tidak bisa menghubungkan ke server." );
            $( "#login-form" ).show( "slow" );
        }
    });
    }
}

// Ambil Mata pelajaran dari database
var isimapel = "";
var materiujian = "";
function mataPelajaran() {
    var url = origurl + "mapel/index.json";
    $.ajax({
        type: 'POST',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            
            for (var key in data) {
                if(obj[key] != undefined) {
                    isimapel = isimapel + "<li><a href=\"#belajar-materi-page\" data-mapel=\""+key+"\" id=\"pilih-mapel\"><h2>"+obj[key]+"</h2></a></li>";
                    materiujian = materiujian + "<li><a href=\"#tryout-page\" data-mapel=\""+key+"\" id=\"pilih-mapel-tryout\"><h2>"+obj[key]+"</h2></a></li>";
                    //console.log(key + ' is ' + obj[key]);
                    //console.log(isimapel);
                }
            }
            $("#learning-mapel").html(isimapel);
            $("#materi-ujian").html(materiujian);
            //$('#learning-mapel').listview('refresh');
            //$('#materi-ujian').listview('refresh');
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            $( "#reg-quote" ).html( "Tidak bisa menghubungkan ke server. " + xhr + textStatus + errorThrown);
            $( "#registrasi-form" ).show( "slow" );
        }
    });
}

// APPS
$(window).on("navigate", function (event, data) {
  var direction = data.state.direction;
  if (direction == 'back' || direction == 'backbutton') {
      // On PENDING Bentar yak!
      if($.mobile.activePage.attr('id') == "") {
      
      } else if ($.mobile.activePage.attr('id') == "login-page") {
          event.preventDefault();
      } else if ($.mobile.activePage.attr('id') == "utama-page") {
          event.preventDefault();
      } else {
          location.hash = "utama-page";
      }

  }
  if (direction == 'forward') {
    location.hash = "utama-page";
  }
});

$( document ).on( "pagecreate", "#histori-page", function() {
    // Swipe to remove list item
    $( document ).on( "swipeleft swiperight", "#list li", function( event ) {
        var listitem = $( this ),
            // These are the classnames used for the CSS transition
            dir = event.type === "swipeleft" ? "left" : "right",
            // Check if the browser supports the transform (3D) CSS transition
            transition = $.support.cssTransform3d ? dir : false;
            confirmAndDelete( listitem, transition );
    });
    // If it's not a touch device...
    if ( ! $.mobile.support.touch ) {
        // Remove the class that is used to hide the delete button on touch devices
        $( "#list" ).removeClass( "touch" );
        // Click delete split-button to remove list item
        $( ".delete" ).on( "vclick", function() {
            var listitem = $( this ).parent( "li" );
            confirmAndDelete( listitem );
            
        });
    }
    function confirmAndDelete( listitem, transition ) {
        // Highlight the list item that will be removed
        listitem.children( ".ui-btn" ).addClass( "ui-btn-active" );
        // Inject topic in confirmation popup after removing any previous injected topics
        $( "#confirm .topic" ).remove();
        listitem.find( ".topic" ).clone().insertAfter( "#question" );
        // Show the confirmation popup
        $( "#confirm" ).popup( "open" );
        // Proceed when the user confirms
        $( "#confirm #yes" ).on( "vclick", function() {
            // Remove with a transition
            if ( transition ) {
                listitem
                    // Add the class for the transition direction
                    .addClass( transition )
                    // When the transition is done...
                    .on( "webkitTransitionEnd transitionend otransitionend", function() {
                        // ...the list item will be removed
                        listitem.remove();
                        // ...the list will be refreshed and the temporary class for border styling removed
                        $( "#list" ).listview( "refresh" ).find( ".border-bottom" ).removeClass( "border-bottom" );
                    })
                    // During the transition the previous button gets bottom border
                    .prev( "li" ).children( "a" ).addClass( "border-bottom" )
                    // Remove the highlight
                    .end().end().children( ".ui-btn" ).removeClass( "ui-btn-active" );
            }
            // If it's not a touch device or the CSS transition isn't supported just remove the list item and refresh the list
            else {
                listitem.remove();
                $( "#list" ).listview( "refresh" );
            }
        });
        // Remove active state and unbind when the cancel button is clicked
        $( "#confirm #cancel" ).on( "vclick", function() {
            listitem.children( ".ui-btn" ).removeClass( "ui-btn-active" );
            $( "#confirm #yes" ).off();
        });
    }
});

// 1. Login Program
$( document ).on( "vclick", "#tombol-logout", function() {
    $( "#login-text-1" ).hide();
    $( "#login-form" ).show( "slow" );
    localStorage.removeItem("username");
    localStorage.removeItem("password");
});

$( document ).on( "vclick", "#tombol-login", function() {
    //Tampilkan loading
    var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" );
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
    
      $( "#login-form" ).slideUp( "slow" );
      $( "#login-text-1" ).show( "slow" );
      $( "#login-text-1" ).html( "Sedang bekerja..." );
    
    var url = origurl + "login/index/"+$( "#login-username" ).val()+"/"+$( "#login-password" ).val();
    
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            if(obj.login == "true") {
                $( "#login-form" ).show( "slow" );
                $( "#login-text-1" ).hide();
                //$( "#login-text-1" ).html( "Login berhasil!" );
                $('[id="nama-user"]').each(function() {
                    $(this).html( obj.nama );
                });
                location.hash = "utama-page";
                window.localStorage["username"] = $( "#login-username" ).val();
                window.localStorage["password"] = $( "#login-password" ).val();
            } else {
                $( "#login-text-1" ).html( obj.pesan );
                $( "#login-form" ).show( "slow" );
            }


        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            $( "#login-text-1" ).html( "Tidak bisa menghubungkan ke server." );
            $( "#login-form" ).show( "slow" );
            window.localStorage["username"] = $( "#login-username" ).val();
            window.localStorage["password"] = $( "#login-password" ).val();
        }
    });
    
});

// default event reference
$( document ).on( "vclick", ".hide-page-loading-msg", function() {
    // run code
});

// 2. Registrasi

$( document ).on( "vclick", "#tombol-register", function() {
    //Tampilkan loading
    var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" );
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
    
      $( "#registrasi-form" ).slideUp( "slow" );
      $( "#reg-quote" ).show( "slow" );
      $( "#reg-quote" ).html( "Sedang bekerja..." );
    
    var url = origurl + "login/registrasi.json?username="+$( "#username-registrasi" ).val()+"&password="+$( "#password-registrasi" ).val()+"&repassword="+$( "#repassword-registrasi" ).val()+"&nama="+$( "#nama-registrasi" ).val()+"&email="+$( "#email-registrasi" ).val();
    
    $.ajax({
        type: 'POST',
        url: url,
        timeout: 5000,
        
        username: $( "#login-username" ).val(), 
        password: $( "#login-password" ).val(), 
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            if(obj.registrasi == "true") {
                $( "#reg-quote" ).html( "Registrasi berhasil!" );
                window.localStorage["username"] = $( "#login-username" ).val();
                window.localStorage["password"] = $( "#login-password" ).val();
                $('[id="nama-user"]').each(function() {
                    $(this).html( obj.nama );
                });
                location.hash = "login-page";
            } else {
                $( "#reg-quote" ).html( obj.pesan );
                $( "#registrasi-form" ).show( "slow" );
            }


        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            $( "#reg-quote" ).html( "Tidak bisa menghubungkan ke server. " + xhr + textStatus + errorThrown);
            $( "#registrasi-form" ).show( "slow" );
        }
    });
    
});

// 3. Lupa Password

$( document ).on( "vclick", "#tombol-reset", function() {
    //Tampilkan loading
    var $this = $( this ),
        theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
        msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
        textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
        textonly = !!$this.jqmData( "textonly" );
        html = $this.jqmData( "html" ) || "";
    $.mobile.loading( "show", {
            text: msgText,
            textVisible: textVisible,
            theme: theme,
            textonly: textonly,
            html: html
    });
    
      $( "#lupa-password" ).slideUp( "slow" );
      $( "#password-quote" ).show( "slow" );
      $( "#password-quote" ).html( "Sedang bekerja..." );
    
    var url = origurl + "login/lupa_password.json?email="+$( "#email-lupa" ).val();
    
    $.ajax({
        type: 'POST',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            if(obj.password == "true") {
                $( "#password-quote" ).html( obj.pesan );
            } else {
                $( "#password-quote" ).html( obj.pesan );
                $( "#lupa-password" ).show( "slow" );
            }


        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            $( "#password-quote" ).html( "Tidak bisa menghubungkan ke server. ");
            $( "#lupa-password" ).show( "slow" );
        }
    });
    
});

// 4. Utama Page code

// 5. Halaman Beajar
var isimateri = "";
$( document ).on( "vclick", "#pilih-mapel", function() {
    isimateri = "";
    var idmapel = "";
    idmapel = $(this).data("mapel");
    $.mobile.loading( "show" );
    var url = origurl + "mapel/materi/" + $(this).data("mapel");
    
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            //alert(obj[0]["id"]);
            for (var key in obj) {
                //alert(key);
                if(obj[key] != undefined) {
                    isimateri = isimateri + "<li><a href=\"#belajar-isi-page\" data-mapel=\""+idmapel+"\" data-materi=\""+obj[key]["id"]+"\" id=\"pilih-isi\"><h2>"+obj[key]["materi"]+"</h2></a></li>";
                    //console.log(obj[key]["materi"] + ' is ' + obj[key]["isi"]);
                    //console.log(isimateri);
                }
            }
            $("#learning-materi").html(isimateri);
            $('#learning-materi').listview('refresh');
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            location.hash = "network-error";
        }
    });
});

// 5.1 Halaman Belajar Materi
$( document ).on( "vclick", "#pilih-isi", function() {
    var idmateri = "";
    var idmapel = "";
    idmateri = $(this).data("materi");
    idmapel = $(this).data("mapel");
    $.mobile.loading( "show" );
    var url = origurl + "mapel/isi/" + idmapel + "/" + idmateri;
    
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            for (var key in obj) {
                if(obj[key] != undefined) {
                    $(".judul-learning").html(obj[key]["materi"]);
                    $(".isi-learning").html(obj[key]["isi"]);
                    //console.log(obj[key]["materi"] + ' is ' + obj[key]["isi"]);
                    //console.log(isimateri);
                }
            }
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            location.hash = "network-error";
        }
    });
});


// 6. Soal Tryout
var soal = "";
var nomor = 0;
var jumlahSoal = 0;
var menit = 1;
var detik = 0;
$( document ).on( "vclick", "#pilih-mapel-tryout", function() {
    nomor = 0;
    jumlahSoal = 0;
    menit = 1;
    detik = 15;
    var idmapel = "";
    
    idmapel = $(this).data("mapel");
    $.mobile.loading( "show" );
    var url = origurl + "soal/index/" + idmapel;
    
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            for (var key in obj) {
                jumlahSoal += 1;
            }
            
            if(jumlahSoal == 0) {
                location.hash = "soal-habis";
            } else {
                soal = obj;
                nomor = 1;
                $("#soal-tryout").html(nomor + ". " + soal[nomor-1]["soal"]);
                $("#ans-a").html("A. " + soal[nomor-1]["jawaban_a"]);
                $("#ans-b").html("B. " + soal[nomor-1]["jawaban_b"]);
                $("#ans-c").html("C. " + soal[nomor-1]["jawaban_c"]);
                $("#ans-d").html("D. " + soal[nomor-1]["jawaban_d"]);
                $("#ans-e").html("E. " + soal[nomor-1]["jawaban_e"]);
            }
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            location.hash = "network-error";
        }
    });
});

// Proses menjawab
var jawaban = "";
var id_soal = "";
var no_seri = "";
var id_mapel = "";
var waktu = false;

function updateJawaban() {
    id_soal = soal[nomor-1]["id"];
    var url = origurl + "soal/getjawaban/" + id_mapel + "/" + no_seri + "/" + id_soal;
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,

        success: function(data, textStatus ){
            $.mobile.loading( "hide" );

            //json response
            var obj = jQuery.parseJSON( data );
            if(obj["jawaban"] != undefined) {
                $( "input[name='jawaban']:checked" ).prop('checked', false).checkboxradio('refresh');
                $('#jawaban-'+obj["jawaban"]).prop('checked', true).checkboxradio('refresh');
            }
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            location.hash = "network-error";
        }
    });
}

$( document ).on( "pageshow", "#tryout-page", function() {
    if(waktu == false && jumlahSoal > 0) {
        location.hash = "confirm-tryout";
    }
    $("#tombol-lanjut").html("Lanjut");
    
    $( document ).on( "vclick", "#mulai-tryout", function() {
        if(waktu == false) {
            waktu = setInterval(function () {
                $("#sisa-waktu").html("Waktu "+ menit + ":" + detik);

                if(detik == 0 && menit == 0) {
                    clearInterval(waktu);
                    waktuHabis();
                }

                detik -= 1;
                if(detik == -1 && menit > 0) {
                    menit -= 1;
                    detik += 60;
                }
            }, 1000);
        }
    });
    
    function waktuHabis() {
        //alert("Waktu mengerjakan telah habis");
    }
});

$( document ).on( "vclick", "#tombol-kembali", function() {
    if(nomor > 1) {
        nomor -= 1;
        $("#soal-tryout").html(nomor + ". " + soal[nomor-1]["soal"]);
        $("#ans-a").html("A. " + soal[nomor-1]["jawaban_a"]);
        $("#ans-b").html("B. " + soal[nomor-1]["jawaban_b"]);
        $("#ans-c").html("C. " + soal[nomor-1]["jawaban_c"]);
        $("#ans-d").html("D. " + soal[nomor-1]["jawaban_d"]);
        $("#ans-e").html("E. " + soal[nomor-1]["jawaban_e"]);

        updateJawaban();
    }

    if(nomor == jumlahSoal-1) {
        $("#tombol-lanjut").html("Lanjut");
    }

    if(nomor == 1) {
        $("#tombol-kembali").hide();
    }
});

$( document ).on( "vclick", "#tombol-lanjut", function() {
    jawaban = $( "input[name='jawaban']:checked" ).val();
    $( "input[name='jawaban']:checked" ).prop('checked', false).checkboxradio('refresh');
    id_soal = soal[nomor-1]["id"];
    no_seri = soal[0]["no_seri"];
    id_mapel = soal[0]["id_mapel"];

    if(nomor < jumlahSoal) {
        $("#tombol-kembali").show();
    }

    if(nomor == jumlahSoal) {
        $("#tombol-lanjut").html("Selesai");
    }

    $.mobile.loading( "show" );
    var url = origurl + "soal/jawab/" + id_mapel + "/" + no_seri + "/" + id_soal + "/" + jawaban;

    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,

        success: function(data, textStatus ){
            $.mobile.loading( "hide" );

            //json response
            var obj = jQuery.parseJSON( data );

            if(nomor < jumlahSoal) {
                nomor += 1;
                $("#soal-tryout").html(nomor + ". " + soal[nomor-1]["soal"]);
                $("#ans-a").html("A. " + soal[nomor-1]["jawaban_a"]);
                $("#ans-b").html("B. " + soal[nomor-1]["jawaban_b"]);
                $("#ans-c").html("C. " + soal[nomor-1]["jawaban_c"]);
                $("#ans-d").html("D. " + soal[nomor-1]["jawaban_d"]);
                $("#ans-e").html("E. " + soal[nomor-1]["jawaban_e"]);
                updateJawaban();
            } else { location.hash = "nilai-page"; }
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            location.hash = "network-error";
        }
    });
});

// Selesai ujian
$( document ).on( "pageshow", "#nilai-page", function() {
    clearInterval(waktu);
    waktu = false;
    $.mobile.loading( "show" );
    var url = origurl + "soal/selesai/" + id_mapel + "/" + no_seri + "/";

    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,

        success: function(data, textStatus ){
            $.mobile.loading( "hide" );

            //json response
            var obj = jQuery.parseJSON( data );

            $( "#nilai" ).html( obj.nilai );
            $( "#benar" ).html( obj['jawaban_benar'] );
            $( "#salah" ).html( obj['jawaban_salah'] );
            $( "#jumlah-soal" ).html( obj['jumlah_soal'] );
            $( "#jumlah-soal" ).html( obj['jumlah_soal'] );
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
        }
    });
});

// 7. History Page
$( document ).on( "pageshow", "#histori-page", function() {
    var histori = "";
    
    $.mobile.loading( "show" );
    var url = origurl + "histori";

    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,

        success: function(data, textStatus ){
            $.mobile.loading( "hide" );

            //json response
            var obj = jQuery.parseJSON( data );
            for(var key in obj) {
                histori = histori + '<li>';
                histori = histori + '<a href="#nilai-page" data-idmapel="'+ obj[key]['id_mapel'] +'" data-noseri="'+ obj[key]['no_seri'] +'"  id="buka-histori">';
                histori = histori + '<h3>'+ obj[key]['mapel'] +'</h3>';
                histori = histori + '<p class="topic"><strong>SERI '+ obj[key]['no_seri'] +'</strong></p>';
                histori = histori + '<p>Benar ' + obj[key]['jawaban_benar'] + ' dari '+ obj[key]['jumlah_soal'] +' Soal</p>';
                histori = histori + '<p class="ui-li-aside"><strong>' + obj[key]['tanggal'] + '</strong></p>';
                histori = histori + '</a>';
                histori = histori + '<a href="#" class="delete">Hapus</a>';
                histori = histori + '</li>';
            }
            if(histori != "") {
                $( "#list" ).html( histori );
                $( "#list" ).listview( 'refresh' );
            }
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
        }
    });
});

// Pembahasan Soal
$( document ).on( "vclick", "#tombol-pembahasan", function() {
    $("#tombol-lanjut-p").html("Lanjut");
    
    nomor = 0;
    jumlahSoal = 0;
    
    $.mobile.loading( "show" );
    var url = origurl + "soal/pembahasan/" + id_mapel + "/" + no_seri;
    
    //console.log(url);
    
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 5000,
        
        success: function(data, textStatus ){
            $.mobile.loading( "hide" );
            
            //json response
            var obj = jQuery.parseJSON( data );
            for (var key in obj) {
                jumlahSoal += 1;
            }
                soal = obj;
                nomor = 1;
                $("#soal-tryout-p").html(nomor + ". " + soal[nomor-1]["soal"]);
                $("#ans-a-p").html("A. " + soal[nomor-1]["jawaban_a"]);
                $("#ans-b-p").html("B. " + soal[nomor-1]["jawaban_b"]);
                $("#ans-c-p").html("C. " + soal[nomor-1]["jawaban_c"]);
                $("#ans-d-p").html("D. " + soal[nomor-1]["jawaban_d"]);
                $("#ans-e-p").html("E. " + soal[nomor-1]["jawaban_e"]);
                $("#kunci-jawaban").html(soal[nomor-1]["kunci_jawaban"]);
                $("#jawaban-"+soal[nomor-1]["jawaban"]+"-p").prop('checked', true).checkboxradio('refresh');
        },
        error: function(xhr, textStatus, errorThrown){
            $.mobile.loading( "hide" );
            location.hash = "network-error";
        }
    });
});

$( document ).on( "vclick", "#tombol-kembali-p", function() {
    if(nomor > 1) {
        nomor -= 1;
        $("#soal-tryout-p").html(nomor + ". " + soal[nomor-1]["soal"]);
        $("#ans-a-p").html("A. " + soal[nomor-1]["jawaban_a"]);
        $("#ans-b-p").html("B. " + soal[nomor-1]["jawaban_b"]);
        $("#ans-c-p").html("C. " + soal[nomor-1]["jawaban_c"]);
        $("#ans-d-p").html("D. " + soal[nomor-1]["jawaban_d"]);
        $("#ans-e-p").html("E. " + soal[nomor-1]["jawaban_e"]);
        $("#kunci-jawaban").html(soal[nomor-1]["kunci_jawaban"]);
        $("#jawaban-"+soal[nomor-1]["jawaban"]+"-p").prop('checked', true).checkboxradio('refresh');
    }

    if(nomor == jumlahSoal-1) {
        $("#tombol-lanjut-p").html("Lanjut");
    }

    if(nomor == 1) {
        $("#tombol-kembali-p").hide();
    }
});

$( document ).on( "vclick", "#tombol-lanjut-p", function() {
    if(nomor == jumlahSoal) {
        location.hash = "nilai-page";
    }
    $("#jawaban-"+soal[nomor-1]["jawaban"]+"-p").prop('checked', false).checkboxradio('refresh');
    if(nomor < jumlahSoal) {
        nomor += 1;
        $("#soal-tryout-p").html(nomor + ". " + soal[nomor-1]["soal"]);
        $("#ans-a-p").html("A. " + soal[nomor-1]["jawaban_a"]);
        $("#ans-b-p").html("B. " + soal[nomor-1]["jawaban_b"]);
        $("#ans-c-p").html("C. " + soal[nomor-1]["jawaban_c"]);
        $("#ans-d-p").html("D. " + soal[nomor-1]["jawaban_d"]);
        $("#ans-e-p").html("E. " + soal[nomor-1]["jawaban_e"]);
        $("#kunci-jawaban").html(soal[nomor-1]["kunci_jawaban"]);
        $("#jawaban-"+soal[nomor-1]["jawaban"]+"-p").prop('checked', true).checkboxradio('refresh');
    }

    if(nomor == jumlahSoal) {
        $("#tombol-lanjut-p").html("Selesai");
    }
    
    if(nomor < jumlahSoal) {
        $("#tombol-kembali-p").show();
    }
});

$( document ).on( "vclick", "#buka-histori", function() {
    id_mapel = $( this ).data( "idmapel" );
    no_seri  = $( this ).data( "noseri" );
});