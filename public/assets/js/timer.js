/**
 * create a timer to manage the display of the battle
 */
let time = 4;
//selection of the various elements that will be modified or added 
const timerElement = document.getElementById("timer");
const enemy = document.getElementById("enemy");
const changeEnemy = "<img src={{ enemy.image }} alt='asset enemy'>";
const win = "<img class='win' src='assets/images/mobile/happy_emoji.png' alt='emoji win'>";
const loose = "<img class='loose' src='assets/images/mobile/sad_emoji.png' alt='emoji loose'>";
// the function that will be applied under the effect of the timer 
function reduceTime() {
    timerElement.innerText = time;
    time--;
    switch (time) {
        case 3:
            timerElement.innerText = time;
            break;
        case 2:
            timerElement.innerText = time;
            break;
        case 1:
            timerElement.innerText = time;
            break;
        case 0:
            enemy.innerHTML = changeEnemy;
            if (result < 0) {
                timerElement.innerHTML = loose;
            } else {
                timerElement.innerHTML = win;
            }
            break;
            // the counter continues to rotate and a -1 returns on getready
        case -1:
            document.location.href = '/getready';
    }
}
// setInterval call the reduceTime function every 1000 ms (1 second)
setInterval(reduceTime, 1000);
