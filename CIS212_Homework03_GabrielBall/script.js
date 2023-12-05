function clearTextBoxes()
{
    document.getElementById("username").innerHTML = "";
    document.getElementById("password").innerHTML = "";
}

function fillTextBoxes()
{
    var curUname = document.getElementById("username").innerText;
    var curPass = document.getElementById("password").innerText;
    sessionStorage.setItem("curUname", JSON.stringify(curUname));
    sessionStorage.setItem("curPass", JSON.stringify(curPass));
}