var video = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

        //The API will call this function when the video player is ready.
        function onPlayerReady(event) {
            event.target.playVideo();
        }

        var video = {
            videos: []
        };

        video.play = function (videoid) {
            if ($("#video-" + videoid).length === 0) {
                var $div = $("<div>", {
                    id: "video-" + videoid,
                    "class": "a"
                });
                $("#videosWrapper").append($div);

                console.log('div',$div);

                console.log('videoid', videoid)

                window.currentVideo = new YT.Player("video-" + videoid, {
                    videoId: videoid,
                    events: {
                        'onReady': onPlayerReady
                    }
                });
                
                video.videos.push(window.currentVideo);
            } else {
                $("#video-" + videoid).show();
                var existingVideo = video.videos.find(video => video.b.b.videoId === videoid);
                existingVideo.playVideo();
            }
        }

        //this function exists to initiate the youtube player
        function loadScript() {
            if (typeof (YT) == 'undefined' || typeof (YT.Player) == 'undefined') {
                var tag = document.createElement('script');
                tag.src = "https://www.youtube.com/iframe_api";
                var firstScriptTag = document.getElementsByTagName('script')[0];
                firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            }
        }

        loadScript();

        $(document).on("click", ".js-play-video", function () {
            $('[id^=video-]').hide();
            video.play($(this).data("videoid"));
        });

        $('.videos-modal').on('hidden.bs.modal', function () {
            for (var i = 0; i < video.videos.length; i++) {
                console.log('video', video.videos[i]);
                video.videos[i].pauseVideo();
            }
        });

    };

    return pub;

}(jQuery));