$(document).ready(function()
        {
            $("#submitReg").click(function()
            {
                if($("#data").is(':checked') == false)
                {
                    $("#hiba").text("Az adatkezelés elfogadása kötelező!");
                    return false;
                }
                if($("#emailReg").val()=="")
                {
                    $("#hiba").text("Email cím kitöltése kötelező!");
                    return false;
                }
                if($("#firstNameReg").val()=="" || $("#secondNameReg").val()=="")
                {
                    $("#hiba").text("A név mezők kitöltése kötelező!");
                    return false;
                }
                if($("#pwdReg").val()=="")
                {
                    $("#hiba").text("A jelszó kitöltése kötelező!");
                    return false;
                }
                if($("#pwdRegAgain").val()=="")
                {
                    $("#hiba").text("A jelszó kitöltése kötelező!");
                    return false;
                }
                if($("#pwdRegAgain").val()!=$("#pwdReg").val())
                {
                    $("#hiba").text("A jelszavak nem egyeznek!");
                    return false;
                }
                if($("#postalCode").val()=="")
                {
                    $("#hiba").text("Minden mező kitöltése kötelező!");
                    return false;
                }
                if($("#address").val()=="")
                {
                    $("#hiba").text("Minden mező kitöltése kötelező!");
                    return false;
                }
                if($("#phone").val()=="")
                {
                    $("#hiba").text("Minden mező kitöltése kötelező!");
                    return false;
                }
           
              
                return true;
               
                   });
        });