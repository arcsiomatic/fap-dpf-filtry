<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="cs" style="height: 100%;">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>FAP DPF VIDEO</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
                height: 100vh;
                border: 0;
                overflow: hidden;
            }
        </style>
    </head>
    <body>
        <div class="video-container">
            <video id="titlevideo"  preload="none" width="100%" autoplay muted poster="">
                <source id="videosource" src="" type="video/mp4">
                    Your browser does not support the video tag.
            </video>
        </div>
        <script>

    //SETTINGS
    // if videoparts == 1 videoName = videoFile
    // if videoparts > 1 videofile = 'video/ + videoName + -numofpart.mp4
//            var videoName = 'https://www.youtube.com/watch?v=CekPTO2o7F4';
            var videoName = 'video/video3.mp4';
            var repeatclips = 7;
            var videonum = 1;
            var videoparts = 1;
            var start = 1;

            var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

            function inIframe () {
                try {
                    return window.self !== window.top;
                } catch (e) {
                    return true;
                }
            }
            var inwindow = inIframe();

            function videoIframeIn() {
                //Get the browser dimensions and calculate aspect ratio
                var titlevideo = document.getElementById("titlevideo");
//                console.log(titlevideo +' v2');
                var titlevideosource = document.getElementById("videosource");
                  console.log('in v2, source: '+titlevideosource.getAttribute('src'));
                var aspectRatio = h / w;
                if (aspectRatio < 0.5625) {
                    //Video too tall for viewport.
                    //Set the video width to the browser width
                    //Set height according to aspect ratio.
                    //Finally, offset top/bottom to keep video centred.

                    var newHeight = 0.5625 * w;
                    titlevideo.style.width = w + 'px';
                    titlevideo.style.height = newHeight + 'px';
                    titlevideo.style.bottom = -((newHeight - h) / 2) + 'px';
                } else {

                    //Video too wide for viewport.
                    //Set the video height to the browser height
                    //Set width according to aspect ratio.
                    //Finally, offset left/right to keep video centred.

                    var newWidth = h / 0.5625;
                    titlevideo.style.width = newWidth + 'px';
                    titlevideo.style.height = h + 'px';
                    titlevideo.style.left = -((newWidth - w) / 2) + 'px';
                }
                ;
            }
            ;


            document.addEventListener('DOMContentLoaded', function () {
                videoIframeIn();
            });



            var focusediframe = true;
           var vid = document.getElementById("titlevideo");
            vid.addEventListener("mouseover", function () {
                focusediframe = true;
            }, false);

            vid.addEventListener("mouseout", function () {
                focusediframe = false;
            }, false);

            window.setInterval(function () {
                if (!parent.focused && !focusediframe) {
                    vid.pause();
                    vid.classList.remove('playing');
//                   if (inwindow)  window.parent.parent.document.getElementById('play-icon').style.display = "block";
                }
                if (parent.y > 600) {
                    vid.pause();
                    vid.classList.remove('playing');
                } else if (parent.y <= 600) {
                    if (parent.focused && !focusediframe && start <= repeatclips) {
                        vid.play();
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
//                        vid.pause();
//
//                        
 //                        start=1;
                        vid.classList.add('playing');
//                        if (inwindow) window.parent.parent.document.getElementById('play-icon').style.display = "none";
                    }
                }
            }, 1000);

            vid.addEventListener("click", function (e) {
                if (this.classList.contains('playing')) {
                    vid.pause();
//                    if (inwindow)  window.parent.parent.document.getElementById('play-icon').style.display = "block";
                    this.classList.remove('playing');
                } else {
                    this.classList.add('playing');
                    vid.play();
                    start = 2;
//                    if (inwindow)  window.parent.parent.document.getElementById('play-icon').style.display = "none";
                }
            }, false);

            vid.addEventListener('ended', myHandler, false);

            function myHandler(e) {
                global: videoparts, videoName, videonum;
 //                 document.getElementById('titlevideo').setAttribute('poster','html/images/pozorice'+videonum+'.jpeg');  // nastaví jako pozadí poslední obrázek posledního políčka aktuálního záběru
                videonum = videonum + 1;
                if (start === 1)
                    document.getElementById('titlevideo').setAttribute('poster', '');  // odebere pozadi
                start = start + 1;
                console.log('clip: ' + start);
                if (start <= repeatclips) { // omezení poctu prehrání
                    if (videoparts == 1) var videoFile = videoName;
                    else   var videoFile = 'video/'+videoName+'-' + videonum + '.mp4';
                    vid.setAttribute('src', videoFile);
 //                console.log('video: '+videoFile);
 //    $('#myVideo').attr("loop", true); /* 1 */
 //
 //                    
                    vid.load();
                            /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
                        /* WORK VIDEO STOPED VIDEO STOPED VIDEO STOPED*/
//                    vid.pause();

                    if (videonum === videoparts)
                        videonum = 0;
 //    document.getElementById('myVideo').removeEventListener('ended', myHandler, false) /* 2 */
                }
                else { // po 5 přehráních stop
                    vid.pause();
                    this.classList.remove('playing');
//                    if (inwindow)  window.parent.parent.document.getElementById('play-icon').style.display = "block";
                    videonum = 0;
                }
            }

        </script>

    </body>
</html>