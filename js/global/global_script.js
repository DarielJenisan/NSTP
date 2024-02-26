let myToastTimeout;
$(document).ready(function () {
   // To overlay 2 modals at a time
    $(document).on('show.bs.modal', '.modal', function () {
       const zIndex = 1040 + 10 * $('.modal:visible').length;
       $(this).css('z-index', zIndex);
       setTimeout(() => $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack'));
    });
   // loadNav();

    $('#frmmdlchangepass').submit(function (e) { 
       e.preventDefault();
       changeUserPassword();
    });

    $("body").tooltip({ selector: '[data-toggle=tooltip]' });
   
    $('#mdlconfirm').on("shown.bs.modal", function() {
        $('#btnconfirmmdlokay').focus();
    });
});

function loadNav() {
   $.post("nav/nav_main.php", {}, function (data) {
       $('#sampleid').html('');
       $('#sampleid').html(data);
   });

}

function modal_alert(text, type, duration) {
    // success = meduimaquamarine
    // error = rosybrown
    clearTimeout(myToastTimeout);
    var bgcolor;
    if (type == 'success') {
        bgcolor = 'mediumaquamarine';
    } else if (type == 'danger') {
        bgcolor = 'rosybrown';
    } 
    $('#gbltoast .toast-body').html(text);
    $('#gbltoast .toast-body').css('background-color', bgcolor);
    $('#gbltoast').show()
    myToastTimeout = setTimeout(() => {
        $('#gbltoast').hide(50)
    }, duration);

}

function showloading(type) {
   if (type) {
       $('#mdlloading').modal('show');
   } else {
       $('#mdlloading').modal('hide');
   }
}

function showloadingdiv(element) {
   $(element).html('<div class="w-100 text-center mt-3"><img src="assets/img/loadinggif.gif" height="30"></div>');

}

function modal_confirm(okayfunct, cancelfunct, message) {
   $('#mdlconfirm').modal('show');
   $('#btnconfirmmdlokay').attr('onclick', okayfunct);
   $('#btnconfirmmdlcancel').attr('onclick', cancelfunct);
   $('#pmdlconfirmtext').html(message);

}

function printview(divID) {
   $.post("assets/global/gbl_print.php", {
       divdata: $('#' + divID).html()
   }, function (data) {
       var newWin = window.open('', 'Print', 'height=600,width=800');
       newWin.document.write('<html><body onload="window.print()">' + data + '</body></html>');
       
   });
}

function printview2(divID) {
      var newWin = window.open('', 'Print', 'height=600,width=800');
       newWin.document.write('<html><link href="css/styles.css" rel="stylesheet" /><style>.txt-black{color: black !important;}.hiddentag{display: none;}body{font-family: "Helvetica" !important;font-size: 8px !important;-webkit-print-color-adjust: exact;}#rpt-head{background-color:blue;}</style><body onload="window.print()">' + $('#' + divID).html() + '</body></html>');
//   $.post("assets/global/gbl_print.php", {
//       divdata: $('#' + divID).html()
//   }, function (data) {
     
       
//   });
}



function changeUserPassword(){
   if($('#incpnewpass').val() != $('#incpconfirmpass').val()){
       modal_alert('New password did not match.', 'danger', 3000);
       return;
   }
   $.post("assets/actions/changepass_action.php", {
           currpass:$('#incpcurrpass').val(),
           newpass:$('#incpnewpass').val(),
           confirmpass:$('#incpconfirmpass').val(),
   }, function (data) {
       if(data == 'success'){
           modal_alert('Change password successfully.', 'success', 3000);
           $('#mdlchangepass').modal('hide');
       }else{
           modal_alert(data, 'danger', 3000)
       }
   });
}

function btnDisable(element, type){
   $(element).prop('disabled', type);
}

function logout() {
   $.post("assets/actions/logout.php", {}, function (data) {
       localStorage.clear();
       deleteAllCookies();
       window.location.href = "login.php";
   });
}

function deleteAllCookies() {
   var cookies = document.cookie.split(";");
   for (var i = 0; i < cookies.length; i++) {
       var cookie = cookies[i];
       var eqPos = cookie.indexOf("=");
       var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
       document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
   }

}

// DOWNLOAD FUNCTION
function rpt_export(tblID, filename_init, name, datefrom_init, dateto) {
    if ((datefrom_init == 'none' || datefrom_init == '') && (dateto == 'none' || dateto == '')) {
        filename = filename_init;
    } else {
        datefrom = datefrom_init;
        if (dateto == 'none' || dateto == '' || datefrom_init == dateto) {
            filename = filename_init + '(' + datefrom + ')';
        } else {
            dateto = $.format.date(dateto + ' 00:00:00', 'MMM d, yyyy');
            filename = filename_init + '(' + datefrom + ' - ' + dateto + ')';
        }
    }
    $("#export-tblID").val(tblID),
    $("#export-filename").val(filename),
    $("#export-name").val(name),
    $("#modal-export").modal("show");
}

function modal_download(timer) {
    $("#modal-download").modal("show");
    setTimeout(function() {
        $("#modal-download").modal("hide");
    }, 1000)
}


$("#frm-export").submit(function(e) {
    e.preventDefault();

    $($("#export-tblID").val()).table2excel({
        exclude: ".noExl",
        name: $("#export-name").val(),
        filename: $("#export-filename").val() + ".xls",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true,
        preserveColors: true // set to true if you want background colors and font colors preserved
    })

    modal_download(1000),
        $("#modal-export").modal("hide");
})