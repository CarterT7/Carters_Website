// JavaScript Document
var elUsername = document.getElementById('username');
var elPassword = document.getElementById('password');

function checkLength(minLength, div, feedback, box) {
	
	var el = document.getElementById(div);
	var elBox = document.getElementById(box);
	var elName = div[0].toUpperCase() + div.slice(1);
	var elMsg = document.getElementById(feedback);
	
	if (el.value.length < minLength) 
	{
		elBox.classList.add("has-error");
		elMsg.classList.add("help-block");
		elMsg.innerHTML = elName+' must be '+minLength+' characters or more'; 
	}
	else
	{
		elBox.classList.remove("has-error");
		elBox.classList.add("has-success");
		elMsg.innerHTML = '';
	}
}

elUsername.addEventListener('blur', function() {
	checkLength(6,'username','unFeedback','unBox');
},false);
elPassword.addEventListener('blur', function() {
	checkLength(6,'password','pwFeedback','pwBox');
},false);