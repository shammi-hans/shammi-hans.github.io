$(function(){

$("#login_button").click(function()
    {

        var email=$('#email_id').val();
        var password = $('#password_login').val();
        var dataString = 'email=' + email +'&password='+password;

        $.ajax(
        {
            type: "POST",   
            url: "./backend/login.php",   
            data: dataString,
            success: function(html)
            {
               
               if(html=='0')
               {
                window.location="./";
               }
                else if(html=='1')
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks1').css("display","block");
                    alert("Wrong Password");
                }
                else if(html=='2')
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks2').css("display","block");
                    alert("User dont exist");
                }
                else
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks3').css("display","block");
                    alert("Some Error Occurred.");
                }
              
            }
        });
    

        return false;
    });
});
