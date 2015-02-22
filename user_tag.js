/**
 * Created by yunong on 2/1/2015.
 */

jQuery(document).ready(function($) {
    var id = "user_comment_data";
    var score_list = document.getElementById(id);
    var user_scores = score_list.getAttribute("user_score");
    user_scores = user_scores.split(';');
    //console.log(user_score.length);
    //console.log(user_score);
    var commentAvatars = $('.comment-author');
    var index = 0;
    commentAvatars.each(function() {
        var score = user_scores[index];
        var avatarUrl = userTagData.pluginPath+"Images/";
        var prefix = "invisible";
        var level = 1;
        if(score>0)
            prefix = "good";
        else if (score < 0)
            prefix = "bad";
        score = Math.abs(score);
        if(score > 0.33 && score < 0.66)
            level = 2;
        else if (score > 0.66)
            level = 3;
        avatarUrl += prefix+"_"+level+ ".png";
        $(this).append('<img  class="avatar_right" style="-webkit-user-select: none; cursor: zoom-in;" src="'+ avatarUrl +'" width="50" height="50">');
        index++;
    })

    //now only catch the value when click submit button
    $('input#submit').click(function() {
        // Get all the forms elements and their values in one step
        var values = $('textarea#comment').val();
    });

});

var alchemy_js = function(myText){
    var AlchemyAPI = require('./alchemyapi');
    var alchemyapi = new AlchemyAPI();
    //var myText = "Whoa, AlchemyAPI's Node.js SDK is really great, I can't wait to build my app!";
    alchemyapi.sentiment("text", myText, {}, function(response) {
        console.log("Sentiment: " + response["docSentiment"]["type"]);
    });
}

