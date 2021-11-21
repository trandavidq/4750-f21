//Change dropdown on courses page based on first drop down selected
var returndata;
$(document).ready(function(){
    
    $('#subject').on('change', function(){
        var subject = $(this).val();
        //var countryID = $(this).val();
        if(subject){
            $.post('../db/addCourses.php',{name: 'Donald'},function(data){
                alert(data);
            });
            alert(subject);
        }
        
        else {
            //subject not selected
            //alert('Select subject first');
        }
    });
    //alert ('HELLO');
 });