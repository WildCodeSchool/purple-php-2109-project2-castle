/*** Creates a timer for the fight view*/

 let time = 4;
 // DOM
 const timerElement = document.getElementById("timer");
 const win = "<h3>HURRAY!<br>WELL DONE</h3><img class='emoji win' src='assets/images/mobile/happy_emoji.png' alt='emoji win'>";
 const loose = "<h3>OH NO!<br>WE'VE LOST</h3><img class='emoji loose' src='assets/images/mobile/sad_emoji.png' alt='emoji loose'>";

 // Function that will be executed
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
             // Result is actually a twig element, defined inside the view
             if (result < 0) {
                 timerElement.innerHTML = loose;
             } else {
                 timerElement.innerHTML = win;
             }
             clearInterval(interval);
             setTimeout(() => {
                document.location.href = '/getready';
             }, 2000);
             break;
     }
 
 }
 // setInterval calls the reduceTime function every 1000 ms (1 second)
var interval = setInterval(reduceTime, 1000);