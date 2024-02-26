$(document).ready(function () {
    $('#frmnbsclogin').submit(function (e) { 
        e.preventDefault();
        btnDisable('#btnsubmitlogin', true);
        loginAction();
    });
});

function loginAction() {
    $.post("assets/global/login_action.php", {
        email: $('#inloginemail').val(),
        pass: $('#inloginpass').val(),
    }, function (data) {
        if(data == 'success'){
            alert('Login Successfully');
            window.location.href = "index.php";
        }else{
            alert(data);
            btnDisable('#btnsubmitlogin', false)
        }
    });
}

function btnDisable(element, type){
    $(element).prop('disabled', type);
}