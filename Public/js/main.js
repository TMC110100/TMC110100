$(document).ready(function(){
    $("#username").keyup(function(){
        var user=  $(this).val();
        $.post("./Ajax/CheckUser",{un:user}, function(data){
            $("#messageUn").html(data);
        });
    });
});
