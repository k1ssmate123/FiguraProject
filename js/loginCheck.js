
$(document).ready(function()
        {
            $("#submitLogin").click(function()
            {
                if($("#emailLog").val()=="")
                {
                    $("#hiba").text("Email cím kitöltése kötelező!");
                    return false;
                }
                if($("#pwdLog").val()=="")
                {
                    $("#hiba").text("A jelszó kitöltése kötelező!");
                    return false;
                }
                return true;
               
                   });
        });


