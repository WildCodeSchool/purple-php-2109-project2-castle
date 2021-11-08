let time = 4;
const timerElement = document.getElementById("timer");
const enemy = document.getElementById("enemy");
const changeEnemy = "<img src={{ session.saveEnemy.image }} alt='asset enemy'>";
const win = "<img class='win' src='assets/images/mobile/happy_emoji.png' alt='emoji win'>";
const loose = "<img class='loose' src='assets/images/mobile/sad_emoji.png' alt='emoji loose'>";
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
        case -1:
            document.location.href = '/getready';
    }
}
setInterval(reduceTime, 1000);
