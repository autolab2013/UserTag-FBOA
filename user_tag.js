/**
 * Created by yunong on 2/1/2015.
 */
jQuery(document).ready(function($) {
    var avatarUrl;
    var commentAvatars = $('.comment-author');
    commentAvatars.each(function(){
        var num = Math.floor(Math.random() * 2) + 1;
        if(num == 1){
            avatarUrl = "http://pngimg.com/upload/fish_PNG1159.png";
        }else {
            avatarUrl = "http://fc08.deviantart.net/fs70/f/2009/352/a/3/Little_Fish_png_by_AbsurdWordPreferred.png";
        }
        $(this).append('<img  class="avatar_right" style="-webkit-user-select: none; cursor: zoom-in;" src="'+ avatarUrl +'" width="50" height="50">');
    });

    console.log(commentAvatars);
});
