var timerStarted = false;
var uname = JSON.parse(sessionStorage.getItem("userUname"));
var password = JSON.parse(sessionStorage.getItem("userPassword"));
var firstname = JSON.parse(sessionStorage.getItem("userFname"));
var lastname = JSON.parse(sessionStorage.getItem("userLname"));

function testDisplay()
{
    //alert(uname);
    ///alert(password);
    alert(firstname);
    //alert(lastname);
}

function clicked()
{
    //Increase number of clicks & show
    var i = document.getElementById("numOfClicks").innerText;
    i = parseInt(i);
    i++;
    document.getElementById("numOfClicks").innerText = i;

    if (!timerStarted)
    {
        timerStarted = true;
        var timeLeft = document.getElementById("timeLeft").innerText;
        timeLeft = parseInt(timeLeft);
        var timer = setInterval(function()
        {
            if (timeLeft <= 1)
            {
                document.getElementById("timeLeft").innerText = 0;
                clearInterval(timer);

                var cps = i/5;

                document.getElementById("yourScore").innerText = "In 5 seconds, you clicked " + i + " times, or " + cps + " clicks per second";

                //PUT SCORES STUFF INTO SESSION STORAGE
            }
            else
            {
                timeLeft -= 1;
                document.getElementById("timeLeft").innerText = timeLeft;
            }
        }, 1000);
    }
}