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
            <video id="titlevideo" width="100%" autoplay muted poster="img/videobackground.jpg">
                <source src="video/test-video-1.mp4" type="video/mp4">
                    Your browser does not support the video tag.
            </video>
        </div>
        <script>

            var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
            var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);

            function videoIframe() {
                //Get the browser dimensions and calculate aspect ratio
                var titlevideo = document.getElementById("titlevideo");
                /*console.log(titlevideo); */
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
                videoIframe();
            });



            var focusediframe = true;
            var repeatclips = 13;
            var videonum = 1;
            var videoparts = 10;
            var start = 1;
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
                    window.parent.parent.document.getElementById('playicon').style.display = "block";
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
                        window.parent.parent.document.getElementById('playicon').style.display = "none";
                    }
                }
            }, 1000);

            vid.addEventListener("click", function (e) {
                if (this.classList.contains('playing')) {
                    vid.pause();
                    window.parent.parent.document.getElementById('playicon').style.display = "block";
                    this.classList.remove('playing');
                } else {
                    this.classList.add('playing');
                    vid.play();
                    start = 2;
                    window.parent.parent.document.getElementById('playicon').style.display = "none";
                }
            }, false);

            vid.addEventListener('ended', myHandler, false);

            function myHandler(e) {
 //                 document.getElementById('titlevideo').setAttribute('poster','html/images/pozorice'+videonum+'.jpeg');  // nastaví jako pozadí poslední obrázek posledního políčka aktuálního záběru
                videonum = videonum + 1;
                if (start === 1)
                    document.getElementById('titlevideo').setAttribute('poster', '');  // odebere pozadi
                start = start + 1;
                console.log('clip: ' + start);
                if (start <= repeatclips) { // omezení poctu prehrání
                    var videoFile = 'video/test-video-' + videonum + '.mp4';
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
                    window.parent.parent.document.getElementById('playicon').style.display = "block";
                    videonum = 0;
                }
            }

        </script>

    </body>
</html>