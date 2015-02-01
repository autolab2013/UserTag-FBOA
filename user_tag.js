/**
 * Created by yunong on 2/1/2015.
 */
jQuery(document).ready(function($) {
    var number = "001";
    console.log(userTagData.pluginPath);
    var avatarUrl = userTagData.pluginPath+"Images/"+ number + ".png";
    console.log(avatarUrl);
    $('.comment-author:first').append('<img  class="avatar_right" style="-webkit-user-select: none; cursor: zoom-in;" src="'+ avatarUrl +'" width="50" height="50">');
});
