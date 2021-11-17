const audio = document.getElementById('audio');
const playPauseButton = document.getElementById('music-button');

/*
 Set music on or paused, when music button is clicked.
 Change music icon, regarding to choice.
 Keep choice in localstorage.
*/

function playPause() {
    if (localStorage.getItem("audioOn") === null) {
        localStorage.setItem("audioOn", "true");
        audio.play();
        playPauseButton.setAttribute("src","/assets/images/mobile/music_icon.png");
    } else {
        if (localStorage.getItem("audioOn") === "false"){
            audio.play();
            localStorage.setItem("audioOn", "true");
            playPauseButton.setAttribute("src","/assets/images/mobile/music_icon.png");
        } else {
            audio.pause();
            localStorage.setItem("audioOn", "false");
            playPauseButton.setAttribute("src","/assets/images/mobile/mute_icon.png");
        }
    }
}

/*
    According to player's previous choice, display the correct icon and run music,
    or not, in all pages and all connexions when localstorage is unclear.
*/

function MusicPreference() {
    if (localStorage.getItem("audioOn") === "false"){
        playPauseButton.setAttribute("src","/assets/images/mobile/mute_icon.png");
    } else {          
        playPauseButton.setAttribute("src","/assets/images/mobile/music_icon.png");
        audio.autoplay = true;;
    }
}

MusicPreference();