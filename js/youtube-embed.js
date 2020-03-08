/*
* Released under the MIT license
* Copyright (c) 2014 Undido
* 
*
* Optional: 
*	tb_settings['youtube_embed'] = {
*	player_width:"420px",//embed player width
*	player_height:"315px"//embed player height
*	};
*
* Adjusted by and for 9san.ch
* 
* to do: grab width/height from already existing yt post embed script?
*
*/
$(document).ready(function () {
	if (window.Options && window.Options.get_tab("video")){
        var settings = new script_settings('youtube_embed');
			//expression for finding a youtube url
        var youtubeExptext = /(?:youtube.com\/watch\?[^>]*v=|youtu.be\/)([\w_-]{11})(?:(?:#|\?|&amp;)a?t=([ms\d]+)|[^"])*.*?/i;
        var PlayerWidth = (typeof settings.get('player_width') == "undefined") ? "360px" : settings.get('player_width');
        var PlayerHeight = (typeof settings.get('player_height') == "undefined") ? "270px" : settings.get('player_height');
		var autoPlay = (typeof settings.get('autoplay') == "undefined") ? "1" : ((settings.get('autoplay') == true) ? "1":"0" );


		
		var findYoutubeLink = function(string){
			if (typeof string == "undefined")
				return false;
		
            var match = string.match(youtubeExptext);
            if (match && match[1].length == 11) {
                return match[1];
            } else {
                return false;
            }
		};

        var YouTubeBox = function () {
            //video url
            var yt_url = $(this).attr("href");
            //video id
            var yt_id = findYoutubeLink(yt_url);

            var $button = $("<a/>", {
                        "rel": "nofollow",
                        "target": "_BLANK",
                        "text": "Embed"
                    });

            var $youtubeEmbButtonContainer = $('<span/>', {
					"class": 'embedbutton',
					"data-opened": "false",
					"data-youtubeid": yt_id,
					"css": {
								"cursor": "pointer"
							}
				});
			$youtubeEmbButtonContainer.append(" [");
            $youtubeEmbButtonContainer.append($button);
			$youtubeEmbButtonContainer.append("]");
            $youtubeEmbButtonContainer.click(clickEmbedButton);

            $(this).after($youtubeEmbButtonContainer);
			
			$yt_img = $('<img/>', {
				"id": 'yt-' + yt_id,
				"src": '',
				"css": {
					"position": "absolute",
					"width": "250px",
					"height": "139px",
					"object-fit": "cover",
					"margin-top": "-60px",
					"display": "none",
					"pointer-events": "none",
					"margin-left": "5px",
					"z-index": "20"
				}	
			});
			$youtubeEmbButtonContainer.append($yt_img);
			$youtubeEmbButtonContainer.hover(function() {
				$(this).find("img").css("display", "inline");
				$(this).find("img").attr('src', '//img.youtube.com/vi/' + yt_id + '/0.jpg');
			}, function() {
				$(this).find("img").css("display", "none");
			}
			);
			
        };

        var clickEmbedButton = function () {
            var yt_id = $(this).attr("data-youtubeid");
            var yt_ind = $(this).index();

            if ($(this).attr("data-opened") == "false") {
                $(this).after('<span data-ytid="' + yt_id + '" data-ytind="' + yt_ind + '" class="youtube-box"></br><iframe allowfullscreen style="display:inline-block;width:' + PlayerWidth + ';height:' + PlayerHeight + ';border:none;" class="youtube-frame" src="//www.youtube.com/embed/' + yt_id + '?origin=' + document.location.host + '&autoplay="' + autoPlay + '></iframe></span>');
                $(this).attr("data-opened", "true");
                $(this).children('a').text("Close");
            } else {

                var a = $.find("[data-ytid='" + yt_id + "']" + "[data-ytind='" + yt_ind + "']");
                $(a).remove();
                $(this).attr("data-opened", "false");
                $(this).children('a').text("Embed");
            }

        };

        var YouTubeInit = function () {
            var text = $(this).html();
            var isYoutubeLink = findYoutubeLink(text);

            if (isYoutubeLink != false) {
                $(this).each(YouTubeBox);
            }
        };
		
        var disableYouTubeEmbed = function () {
            $('.embedbutton').each(function () {
				$(this).remove();
			});
            $('.youtube-box').each(function () {
				$(this).remove();
			});
        };

		var emb_vid = localStorage['embvid'] ? true : false;
		var selector, event;
		
		
		
		$('fieldset#youtube').append('<div><label id="toggle-emb-vid"><input type="checkbox"> Embed youtube links</label></div>');
		
		selector = "#toggle-emb-vid>input";
		event = "click";
		
		$(selector).prop("checked", !emb_vid);


        $(selector).on(event,function () {
				if (!$(this).prop("checked")){
					emb_vid = true;
					disableYouTubeEmbed();
					localStorage['embvid'] = true;
				} else {
					emb_vid = false;
					delete localStorage['embvid'];
					$(".body a").each(YouTubeInit);
				}
            });
			
        if (!emb_vid){
           $(".body a").each(YouTubeInit);
		}
        $(document).bind('new_post', function (e, post) {
                if (!emb_vid)
                    $(post).find('.body a').each(YouTubeInit);
            });
	}


	
});

$( window ).on( "load", function() {
	var do_yt_css = function() {
			$('#yt-css').remove();
			
			// Find background of reply posts
			var yt_dummy_reply = $('<div class="post reply"></div>').appendTo($('body'));
			var yt_reply_background = yt_dummy_reply.css('backgroundColor');
			var yt_reply_border_style = yt_dummy_reply.css('borderStyle');
			var yt_reply_border_color = yt_dummy_reply.css('borderRightColor');
			var yt_reply_border_width = yt_dummy_reply.css('borderWidth');
			
			yt_dummy_reply.remove();
			
			$('<style type="text/css" id="yt-css">\
			img[id^="yt-"] {\
				padding:2px;\
				background: ' + yt_reply_background + ';\
				border-style:solid solid solid solid;\
				border-width:1px 1px 1px 1px;\
				border-color: ' + yt_reply_border_color + ';\
			}\
			</style>').appendTo($('head'));
		};
	do_yt_css();
});