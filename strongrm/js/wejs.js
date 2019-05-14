/**
 * Created by WeSoft on 3/22/2017.
 */

$(document).ready(function(){



$(".ballot").click(function(){
        $(this).addClass("ballot-selected");


});


});


function get_next(){

    $.get("getconts.php",function(data){
        show_prog();
        $("#vote_area").fadeOut(100);
        $("#vote_area").html(data);
        $("#vote_area").fadeIn(500);

    }).done(function(){

        hide_prog();
    });

}



function show_prog(){
    $(".load-label").slideDown(100);

}


function hide_prog(){

    $(".load-label").slideUp(100);

}

function submit_votes(){
    show_prog();
    $.get("submit_votes.php", function(){
    }).done(function(){
        $(".load-label").html("Your votes were submited successfully");

        window.location = "./"


    });




}
