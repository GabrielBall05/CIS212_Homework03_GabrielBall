function display()
{
    var uname = JSON.parse(sessionStorage.getItem("userUname"));
    console.log("USERNAME " + uname);
    alert(uname);
}

function test()
{
    alert("test");
}