function invit_player(id_user) {
    $.ajax({
        type: "POST",
        url: "index.php?action=invit",
        param : id_user,
        async: true, /* If set to non-async, browser shows page as loading */
        cache: false,
        timeout:30000, /* Timeout in ms */

        success: function(data){ /* called when request to PFTopFrontPushURI completes */
            if (data.res = 'OK') animation('Vous avez provoquer '+res.name);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            animation("error", textStatus + " (" + errorThrown + ")");
        }
    });
}

$('.player_link').click(function () {
   id_user = $(this).attr('data-player');
   invit_player(id_user);
});