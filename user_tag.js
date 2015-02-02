/**
 * Created by yunong on 2/1/2015.
 */
jQuery(document).ready(function($) {
    var number = "001";
    var commentAvatars = $('.comment-author');
    commentAvatars.each(function() {
        var avatarUrl = userTagData.pluginPath+"Images/";
        var num = Math.floor(Math.random() * 3) + 1;
        avatarUrl += "00" + num + ".png";
        $(this).append('<img  class="avatar_right" style="-webkit-user-select: none; cursor: zoom-in;" src="'+ avatarUrl +'" width="50" height="50">');

    })

    $('input#submit').click(function() {
            // Get all the forms elements and their values in one step
            var values = $('textarea#comment').val();
    });
    console.log(commentAvatars);

});
