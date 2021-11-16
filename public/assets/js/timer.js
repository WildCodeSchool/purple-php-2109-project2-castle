/**
 * creer un timer pour gerer l'affichage de la bataille
 */


let time = 4;
//selection des divers element qui vont etre modifier ou ajouté 
const timerElement = document.getElementById("timer");
const enemy = document.getElementById("enemy");
//const changeEnemy = "<img src={{ session.saveEnemy.image }} alt='asset enemy'>";
const win = "<h3>HURRAY!<br>WELL DONE</h3><img class='emoji win' src='assets/images/mobile/happy_emoji.png' alt='emoji win'>";
const loose = "<h3>OH NO!<br>WE'VE LOST</h3><img class='emoji loose' src='assets/images/mobile/sad_emoji.png' alt='emoji loose'>";
// la fonction qui sera appliquer sous l'effet du timer 
function reduceTime() {
    timerElement.innerHTML = "<h4>" + time + "</h4>";
    time--;
    switch (time) {
        case 3:
            timerElement.innerHTML = "<h4>" + time + "</h4>";
            break;
        case 2:
            timerElement.innerHTML = "<h4>" + time + "</h4>";
            break;
        case 1:
            timerElement.innerHTML = "<h4>" + time + "</h4>";
            break;
        case 0:
            // enemy.innerHTML = changeEnemy;
            if (result < 0) {
                timerElement.innerHTML = loose;
            } else {
                timerElement.innerHTML = win;
            }
            document.location.href = '/getready';
            break;
           // case -1:
               // document.location.href = '/getready';
    }

}
// setInterval appel la fonction reduceTime tout les 1000 ms (1 seconde) 
setInterval(reduceTime, 1000);
