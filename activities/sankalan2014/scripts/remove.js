$(function(){

$("#remove_team").click(function()
{
$("#remove_team").addClass("no_display");
$(".loading").removeClass("no_display");
        
        var dataString = 'remove_team=true';

        $.ajax(
        {
            type: "POST",   
            url: "./backend/user_options.php",   
            data: dataString,
            success: function(html)
            {
               
               if(html=='0' || html=='1' || html=='2')
               {
                alert("Some error Occurred");
                $(".loading").addClass("no_display");
                $("#remove_team").removeClass("no_display");
               }
                else if(html=='3')
                {
                    alert("Removed from team");
                    $(".loading").addClass("no_display");
                    $("#remove_team").removeClass("no_display");
                    window.location="./";
                }
                else
                {
                    alert(html);
                    $(".loading").addClass("no_display");
                    $("#remove_team").removeClass("no_display");
                }
              
            }
        });
    

        return false;
    });

$("#delete_team").click(function()
{
$("#delete_team").addClass("no_display");
$(".loading").removeClass("no_display");
        
        var dataString = 'delete=true';

        $.ajax(
        {
            type: "POST",   
            url: "./backend/team_leader_options.php",   
            data: dataString,
            success: function(html)
            {
               if(html=='0' || html=='1' || html=='2')
               {
                alert("Some error Occurred");
                $(".loading").addClass("no_display");
                $("#delete_team").removeClass("no_display");
               }
                else if(html=='3')
                {
                    alert("Team Deleted");
                    $(".loading").addClass("no_display");
                    $("#delete_team").removeClass("no_display");
                    window.location="./";
                }
                else
                {
                    alert(html);
                    $(".loading").addClass("no_display");
                    $("#delete_team").removeClass("no_display");
                }
              
            }
        });
    

        return false;
    });

});
