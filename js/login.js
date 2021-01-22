$(document).ready(function(){
    $("#login").click(function () {
        if (checkUsername() && checkPassword()) {
            $("#info").submit();
        } else {
            checkUsername();
            checkPassword();
        }
    });
    $(document).keyup(function (event) {
        if (event.keyCode == 13) {
            if (checkUsername() && checkPassword()) {
                $("#info").submit();
            } else {
                checkUsername();
                checkPassword();
            }
        }
    })
})