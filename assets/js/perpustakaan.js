function cekUsername() {
  jQuery.ajax ({
    url: "../../../functions/cekusername.php",
    data:'username='+$("#username").val(),
    type: "POST",
    success:function(data){
      $("#message").html(data);
    },
    error:function (){}
    });
  }

function cekPassword() {
    
  var password = $("#password-baru").val();
  var ulangiPassword = $("#password-ulangi").val();
  var panjang = $("#password-baru").val().length;

  if (panjang >= 6) {
    if (password != ulangiPassword) {
      $(document).ready(function () {
        $("#passwordCek").html("<span class='text-light badge badge-danger'>Password Tidak Sama!</span>");
      });
    } else {
      $(document).ready(function () {
        $("#passwordCek").html("<span class='text-light badge badge-success'>Password Sama!</span>");
      });
    }
  } else {
    $(document).ready(function () {
      $("#passwordCek").html("<span class='text-light badge badge-danger'>Password Kurang Dari 6 Karakter!</span>");
    });
  }
  
  

  $(document).ready(function () {
    $("#password-baru, #password-ulangi").keyup(cekPassword);
  });
}

function blockCharInput() {
  $('#username').on('keypress', function(e) {
      if (e.which == 32)
          return false;
      });

  $('#email').on('keypress', function(e) {
      if (e.which == 32)
          return false;
      });
}

function bootstrapFileInput() {
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
}

function hitungPengarang(halaman, kategori) {
  $( document ).ready(function() {
    $('#option').load('../../functions/hitungpengarang.php?kategori_pengarang=' + kategori + '&halaman=' + halaman);
  });
}

function hitungCariBuku(halaman, q) {
  $( document ).ready(function() {
    $('#option').load('../../functions/hitungcaribuku.php?q=' + q + '&halaman=' + halaman);
  });
}

function hitungPengguna(halaman, id) {
  $( document ).ready(function() {
    if($('#cariUser').val()!=""){
      $('#option').load('../../functions/hitungpengguna.php?id=' + id + '&halaman=' + halaman + '&cari');
    } else {
      $('#option').load('../../functions/hitungpengguna.php?id=' + id + '&halaman=' + halaman);
    }
  });
}

function tampilkanPengguna(halaman, id) {
  $( document ).ready(function() {
    if($('#cariUser').val()!=""){
      $('#paraPengguna').load('../../functions/tampilkanPengguna.php?id=' + id + '&halaman=' + halaman + '&cari');
    } else {
      $('#paraPengguna').load('../../functions/tampilkanPengguna.php?id=' + id + '&halaman=' + halaman);
    }
  });
}

function hitungSemuaBuku(halaman, kategori, urut) {
  $( document ).ready(function() {
    $('#option').load('../../functions/hitungsemuabuku.php?kategori=' + kategori + '&halaman=' + halaman + '&urut=' + urut);
  });
}

function ajaxCari(q) {
  $( document ).ready(function() {
    $('#liveSearch').load("../../functions/ajaxAutocomplete.php?q=" + q);
  });
}


function countChar(val) {
  var len = val.value.length;
  if (len >= 140) {
    val.value = val.value.substring(0, 140);
  } else {
    $('#jumlahKarakter').text(140 - len);
  }
};
