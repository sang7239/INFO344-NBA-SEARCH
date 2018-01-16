$(function() {
    $(".search_button").click(function() {
        var playerName = $(".search_box").val();
        if(playerName) {
            $.ajax({
                type: "POST",
                url: "dbmanager.php",
                data: "search=" + playerName,
                beforeSend: function(response) {
                    $("#results").html(""); 
                },
                success: function(response){
                    $("#results").append(response);
                }
            });
        }
        return false;
    });
});
