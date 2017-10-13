$(function(){
$.ajaxSetup({cache: false});

  $("#sendMsg").click(function()
    {
        // alert("called");
        var email=$('#email_id').val();
        var message = $('#messageText').val();
        var dataString = 'email=' + email +'&message='+message;

        $.ajax(
        {
            type: "POST",   
            url: "./scripts/feedback.php",   
            data: dataString,   
            success: function(html)
            {
                alert(html);
                if(html=='0')
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks').css("display","block");
                    $("#contactResponseP").html("Thanks for your valuable feedback.<br /> Your thought will definitely help us to improve.<br /><br />");
                }
                else if(html=='1')
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks1').css("display","block");
                    $("#contactResponseP").html("Wrong Email!");
                }
                else if(html=='2')
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks2').css("display","block");
                    $("#contactResponseP").html("Please enter a valid message.");
                }
                else
                {
                    // $('#feedbackdiv').css("display","none");
                    // $('#thanks3').css("display","block");
                    $("#contactResponseP").html("Some Error Occurred.");
                }
              
            }
        });
    

        return false;
    });

    // alert("hello");

  
});

