$(document).ready(function() {
    //update currency value in each 5secs
    setInterval(function() {
        var message = '<?php echo((currentrate("BTC","INR",10))['message']) ?>';
        $("#output").html(message);
    },5000);   
});