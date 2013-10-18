function waitForMsg(){
    /* This requests the url PFTopFrontPushURI
     When it complete (or errors) */
    $.ajax({
        type: "GET",
        url: "pusher.php?action=get_msgs",
        async: true, /* If set to non-async, browser shows page as loading */
        cache: false,
        timeout:30000, /* Timeout in ms */

        success: function(data){ /* called when request to PFTopFrontPushURI completes */
            processmsg(data); /* pushes data in dom or whatever ... */
            setTimeout(
                waitForMsg, /* Request next message */
                1000 /* ..after 1 seconds */
            );
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            addmsg("error", textStatus + " (" + errorThrown + ")");
            setTimeout(
                waitForMsg, /* Try again after.. */
                10000); /* milliseconds */
        }
    });
}


function processmsg() {
    data = JSON.parse(data);
}

$(document).ready(function(){
    waitForMsg(); /* Start the inital request */
});