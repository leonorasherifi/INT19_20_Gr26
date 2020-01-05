const gjeresiaRrafshit=750;
const gjatesiaRrafshit=500;
var canvas=document.getElementById('game');
var ctx=canvas.getContext("2d");

var bgReady=false;
var bgImage=new Image();
bgImage.src="../images/about/background.jpeg";
bgImage.onload=function() {
	bgReady=true;		
}

var shtepia={};
	shtepia.x =gjeresiaRrafshit/2;
	shtepia.y =gjatesiaRrafshit/2;
var shtepiaSpeed=0.5;

var shtepiaReady=false;
var shtepiaImage=new Image();
shtepiaImage.src="../images/about/smart-home.png";
shtepiaImage.onload=function() {
	shtepiaReady=true;
}

var porosia={};
	porosia.x =gjeresiaRrafshit-100;
	porosia.y =gjatesiaRrafshit-100;
var numeroPorosite=0;
var porosiaReady=false;
var porosiaImage=new Image();
porosiaImage.src="../images/about/gift.png";
porosiaImage.onload=function() {
	porosiaReady=true;
}


/*Caktimi i pozites permes psudo klasave dhe prototipeve ne js */
function nderroPozitatClass() {
};
nderroPozitatClass.prototype.randomRoll = function() {
var randNum = 32+(Math.random()*(gjatesiaRrafshit-100) );
return randNum;
};
var randamPosition=new nderroPozitatClass();

function reset() {
	shtepia.x =gjeresiaRrafshit/2;
	shtepia.y =gjatesiaRrafshit/2;
	porosia.x=randamPosition.randomRoll();
	porosia.y=randamPosition.randomRoll();
}

var drawGame = {
	start: function(){
			window.addEventListener('keydown', function (e) {
            drawGame.key = e.keyCode;
       	 });
	        window.addEventListener('keyup', function (e) {
	            drawGame.key = false;
	     })  
	    }
}; 	
var numri=0;

drawGame.start();
setInterval(function() {
	if(bgReady){ctx.drawImage(bgImage,0,0);}
	if(shtepiaReady){ctx.drawImage(shtepiaImage,shtepia.x,shtepia.y);}
	if(porosiaReady){ctx.drawImage(porosiaImage,porosia.x,porosia.y);}
	if(shtepia.x<=(porosia.x+32)
		&& porosia.x<=(shtepia.x+32)&&
		shtepia.y<=(porosia.y+32)&&
		porosia.y<=(shtepia.y+32)){clickCounter(); reset();}
	ctx.fillStyle="white";
	ctx.textBaseLine="top";
	ctx.textAlign="left";
	ctx.font="18px Helvatica";
	ctx.fillText("Your home has collected "+numriPorosive.getLocalStorage()+" items during all the time",32,32);
	ctx.fillText("Your home has made "+numriPorosive.getSessionStorage()+" collections since you opened your browser",32,52);
	updateGameArea();
},1)


function updateGameArea() {
	    if (drawGame.key && drawGame.key == 65) {shtepia.x+= -shtepiaSpeed; }
	    if (drawGame.key && drawGame.key == 68) {shtepia.x += shtepiaSpeed; }
	    if (drawGame.key && drawGame.key == 87) {shtepia.y+= -shtepiaSpeed; }
	    if (drawGame.key && drawGame.key == 83) {shtepia.y += shtepiaSpeed; } 
}


function clickCounter() {
    if(typeof(Storage) !== "undefined") {
        if (localStorage.clickcount) {
            localStorage.clickcount = Number(localStorage.clickcount)+1;
        }
        else {
            localStorage.clickcount = 1;
        }
        if (sessionStorage.clickcount) {
            sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
        } else {
            sessionStorage.clickcount = 1;
        }
        localStorage.setItem("nr",localStorage.clickcount);
        sessionStorage.setItem("nr",sessionStorage.clickcount);
    }
}
   
function getStorage(){}
getStorage.prototype.getLocalStorage=function () {
	return localStorage.getItem("nr");
}
getStorage.prototype.getSessionStorage=function () {
	return sessionStorage.getItem("nr");
}
var numriPorosive=new getStorage();