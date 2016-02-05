
$("#login-submit").click(function () {

    var formData = $("#login-form").serialize();
    var login = $('#email').val();
    var pass = $('#password').val();
    if(login != '')
    {
        $("#email").css({'border-color': '#3c8dbc'});
    }
     if(pass != '')
    {
        $("#password").css({'border-color': '#3c8dbc'});
    }
    if ((login == '') || (pass == '')) {
        $("#email").css({'border-color': 'red'});
        $("#password").css({'border-color': 'red'});
        $("#msgbox").html("<center>Vueillez remplire les champs</center>");
        $("#msgbox").css({'color': 'red'});
        $("#msgbox").css({'font-size': '12pt'});
        $('#pass').val('')
        $('#login').val('');

        return false;
    } else {

    
        $.post(
                'auth.php',
                formData,
                function (data) {

                    if (data == 0) {



                        $("#msgbox").html("<center>Erreur d'authentification</center>");
                        $("#msgbox").css({'color': 'red'});
                        $("#msgbox").css({'font-size': '12pt'});


                    }
                    else
                    {
                        window.location.href = 'liste_sortie.php';
                    }


                }

        );

        $("#login-form").submit(function () {

            return false;
        });

    }

});