var timerStarted = false;
var uname = JSON.parse(sessionStorage.getItem("userUname"));
var password = JSON.parse(sessionStorage.getItem("userPassword"));
var firstname = JSON.parse(sessionStorage.getItem("userFname"));
var lastname = JSON.parse(sessionStorage.getItem("userLname"));

function init()
{
    //alert("test");
    //alert(uname);
    ///alert(password);
    //alert(firstname);
    //alert(lastname);

    var longDate = new Date();
    var date = (longDate.getMonth() + 1) + "-" + longDate.getDate() + "-" + longDate.getFullYear();
    document.getElementById("dateAchieved").value = date;
    document.getElementById("saveFor").value = uname;
    document.getElementById("saveScoreBtn").disabled = true;
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

                var totalClicks = document.getElementById("numOfClicks").innerText;
                var cps = totalClicks/5;
                document.getElementById("clicksPerSecond").value = cps;
                var longDate = new Date();
                var date = (longDate.getMonth() + 1) + "-" + longDate.getDate() + "-" + longDate.getFullYear();
                document.getElementById("dateAchieved").value = date;

                document.getElementById("saveScoreBtn").disabled = false;
                document.getElementById("gameWindow").disabled = true;

                var addBtn = document.getElementById("addRestartBtn");
                var restartGameBtn = document.createElement("button");
                restartGameBtn.setAttribute("id", "restartGameBtn");
                restartGameBtn.setAttribute("onclick", 'restartGame()');
                restartGameBtn.innerText = "Restart Game";
                addBtn.appendChild(restartGameBtn);
            }
            else
            {
                timeLeft -= 1;
                document.getElementById("timeLeft").innerText = timeLeft;
            }
        }, 1000);
    }
}

function restartGame()
{
    //RESTART
    document.getElementById("gameWindow").disabled = false;
    timerStarted = false;
    document.getElementById("addRestartBtn").removeChild(document.getElementById("restartGameBtn"));
    document.getElementById("timeLeft").innerText = 5;
    document.getElementById("numOfClicks").innerText = 0;
}