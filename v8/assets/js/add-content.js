// JavaScript Document
var today = new Date(); // current date
var hourNow = today.getHours(); // current hour
var greeting; // greeting string
var eltag = document.getElementById("greetingDiv");

if (hourNow > 18) { // 6 pm or later
	greeting = 'Good Evening!';
} else if (hourNow > 12) { 
	greeting = 'Good Afternoon!';
} else if (hourNow > 0) {
	greeting = 'Good Morning!';
} else {
	greeting = 'Welcome!';
}

eltag.innerHTML = '<h3>' + greeting + '</h3>'; // assign the value to innerHTML