window.addEventListener('DOMContentLoaded', (event) => {
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var g = document.getElementById("guest")
    var z = document.getElementById("btn");
    var f = document.getElementById("formbox");
   
    document.getElementById("register-btn").addEventListener("click", function() {
        x.style.left = "-400px";
        y.style.left = "150px";
        z.style.left = "115px"
        g.style.left = "-400px"
        x.style.display = "none";
        y.style.display = "unset";
        g.style.display = "none"; 
        
    });
    document.getElementById("login-btn").addEventListener("click", function() {
        x.style.left = "150px";
        y.style.left = "450px";
        z.style.left = "0px"
        x.style.display = "unset";
        y.style.display = "none";
        g.style.display = "none"
    });
    document.getElementById("guest-btn").addEventListener("click", function() {
        x.style.left = "-400px";
        y.style.left = "450px";
        z.style.left = "240px"
        g.style.left = "150px"
        x.style.display = "none";
        y.style.display = "none";
        g.style.display = "unset"
    });


    }); 


    function reg(){
        console.log('dziala')
        document.getElementById("login").style.left = "-400px";
        document.getElementById("register").style.left = "150px";
        document.getElementById("btn").style.left = "115px";
        document.getElementById("login").style.display = "none";
        document.getElementById("register").style.display = "unset"; 
    }

    function log(){
        document.getElementById("login").style.left = "150px";
        document.getElementById("register").style.left = "450px";
        document.getElementById("btn").style.left = "0px"
        document.getElementById("login").style.display = "unset";
        document.getElementById("register").style.display = "none";
        document.getElementById("guest").style.display = "none"; 
    }
    