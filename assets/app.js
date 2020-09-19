var min=sec=msec=ns=0;
var minute=document.getElementById('min');
var second=document.getElementById('sec');
var milisecond=document.getElementById('msec');
var nsec=document.getElementById('ns');
var interval;
function timer(){
msec++;
milisecond.innerHTML=msec;
if (msec>=1279) {
     
      msec=1280;
}


}

//interval= setInterval(timer,00)


function timer1(){
    sec++;
    second.innerHTML=sec;
    if (sec>=214) {
         
        sec=215;
    }
}
    

    //interval= setInterval(timer1,10)
   


    function timer2(){
        min++;
        minute.innerHTML=min;
        if (min>=1223) {
             
            min=1223;
        }
    }
        
    
        //interval= setInterval(timer2,00)
       

        function timer3(){
            ns++;
    nsec.innerHTML=ns;
            if (ns>=3333.5) {
                 
                ns=3333.5;
            }
        }
            
        
            //interval= setInterval(timer3,00)
           




              // Set the date we're counting down to
        var countDownDate = new Date("Aug 10, 2020 15:37:25").getTime();
        
        // Update the count down every 1 second
        /*var countdownfunction = setInterval(function() {
        
          // Get todays date and time
          var now = new Date().getTime();
          
          // Find the distance between now an the count down date
          var distance = countDownDate - now;
          
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
          // Output the result in an element with id="demo"
          document.getElementById("demo").innerHTML = days + "d " ;
          document.getElementById("demo1").innerHTML =  hours + "h ";
          document.getElementById("demo2").innerHTML = minutes + "m" ;
        document.getElementById("demo3").innerHTML = seconds + "s ";
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(countdownfunction);
            document.getElementById("demo").innerHTML = "EXPIRED";
            document.getElementById("demo1").innerHTML = "EXPIRED";
            document.getElementById("demo2").innerHTML = "EXPIRED";
            document.getElementById("demo3").innerHTML = "EXPIRED";
          }
        }, 1000);*/



