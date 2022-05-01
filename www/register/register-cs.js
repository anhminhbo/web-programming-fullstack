var inf = document.getElementById("inf");

function preview() {
    var fr = document.getElementById("frame");
    fr.style.display = "block";
    frame.src = URL.createObjectURL(event.target.files[0]);
    inf.style.display = "none";
}

function clearImage() {
    document.getElementById('formFile').value = null;
    frame.src = "";
    inf.style.display = "initial"
}

function check_pass(){
    var alert = document.getElementById("alert");
    if (document.getElementById("pass").value != document.getElementById("re-pass").value){  
        document.getElementById("alert-re-pass").style.display = "block"
    }
    else{
        document.getElementById("alert-re-pass").style.display = "none"
    }
}

document.getElementById("r-btn").onclick = function(e){
    e.preventDefault();
    location.reload();
}

var nameregex = /^[A-Za-z]{2,20}$/;
var passregex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

document.getElementById("fname").onkeyup = function(e){
    if (!document.getElementById("fname").value.match(nameregex)){
        document.getElementById("alert-fname").style.display = "block";
    }
    else{
        document.getElementById("alert-fname").style.display = "none";
    }
}

document.getElementById("lname").onkeyup = function(e){
    if (!document.getElementById("lname").value.match(nameregex)){
        document.getElementById("alert-lname").style.display = "block";
    }
    else{
        document.getElementById("alert-lname").style.display = "none";
    }
}

document.getElementById("pass").onkeyup = function(e){
    if (!document.getElementById("pass").value.match(passregex)){
        document.getElementById("alert-pass").style.display = "block";
    }
    else{
        document.getElementById("alert-pass").style.display = "none";
    }
    check_pass();
}
