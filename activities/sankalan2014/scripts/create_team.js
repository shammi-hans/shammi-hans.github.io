$(function(){

$("#create_team_bt").click(function()
{
$("#create_team_bt").addClass("no_display");
$(".loading").removeClass("no_display");

        var team_name=$('#team_name').val();
        var college_name= $('#college_name').val();
        var team_size= $('#team_size').val();
   
        if(team_name=='')
        {
            alert("Team name cant be empty");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

            return false;
        }
        if(college_name=='')
        {
            alert("College name cant be empty");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

            return false;
        }
        if(team_size<1 || team_size>6)
        {
            alert("Your Team size can only be between 1-6");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

            return false;
        }

        var dataString = 'team_name=' + team_name +'&college_name='+college_name + '&team_size=' +team_size;
        var j=0;

        for(i=0;i<5;i++)
        {
            if($("#team_member_"+(i+1)).val()!='')
            {
                j++;
                dataString+='&team_member_'+(i+1)+'='+$("#team_member_"+(i+1)).val();
            }                  
        }

        if(team_size-1!=j)
        {
            alert("Team size is not valid");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

            return false;
        }
        
        $.ajax(
        {
            type: "POST",   
            url: "./backend/creat_team.php",   
            data: dataString,
            success: function(html)
            {
               
               if(html=='0')
               {
                alert("Team size not valid");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

               }
                else if(html=='1')
                {
                    alert("Some Error Occurred");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

                }else if(html=='5')
                {
                    alert("Team Created Successfully");
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

                    window.location="./";
                }
                else
                {
                    alert(html);
$(".loading").addClass("no_display");
$("#create_team_bt").removeClass("no_display");

                }
              
            }
        });
    

        return false;
    });
});
