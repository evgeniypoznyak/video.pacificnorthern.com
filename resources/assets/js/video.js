/**
 * Created by Evgeniy on 5/23/2017.
 */

$(window).keypress(function (e) {
    var video = document.getElementById("myVideo");

    if (e.which == 32) {
        if (video.paused == true)
            video.play();
        else
            video.pause();
    }


    if (e.which == 61) {
        video.volume = video.volume + 0.1;
    }
    if (e.which == 38) {
        video.volume = video.volume + 0.1;
    }
    if (e.which == 45) {
        video.volume = video.volume - 0.1;
    }
    if (e.which == 40) {
        video.volume = video.volume - 0.1;
    }

    if ((e.keyCode === 44) || (e.keyCode === 1073)) { //left arrow

        if (video.currentTime > 0) {
            //one frame back
            video.currentTime = video.currentTime - 1;
        }
    } else if ((e.keyCode === 46) || (e.keyCode === 1102)) { //right arrow
        if (video.currentTime < video.duration) {
            //Don't go past the end, otherwise you may get an error
            video.currentTime = video.currentTime + 1;
        }
    }


});


var reload_vid = document.getElementById("myVideo");
reload_vid.onended = function () {


};


var video = $("#myVideo");

//play-pause on click
video.click(function (e) {
    var vid = video[0];
    this.paused ? this.play() : this.pause();

});


// full screen on dblclick
video.dblclick(function (e) {
    var vid = video[0];
    // vid.play();

    if (!document.fullscreenElement &&    // alternative standard method
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) {  // current working methods
        vid.play();
        if (vid.requestFullscreen) {
            vid.requestFullscreen();
        } else if (vid.msRequestFullscreen) {
            vid.msRequestFullscreen();
        } else if (vid.mozRequestFullScreen) {
            vid.mozRequestFullScreen();
        } else if (vid.webkitRequestFullscreen) {
            vid.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }


});


var vid = document.getElementById("myVideo");


$(document).ready(function () {


});


function vidplay() {
    var video = document.getElementById("myVideo");

    if (video.paused) {
        video.play();
        button.textContent = "||";
    } else {
        video.pause();
        button.textContent = ">";
    }
}
