// JavaScript Document
var elFirstName = document.getElementById('firstName');
var elLastName = document.getElementById('lastName');
var elEmail = document.getElementById('email');
var elUsername = document.getElementById('username');
var elPassword = document.getElementById('password');
var elPhoneNum = document.getElementById('phoneNumber');
var elComments = document.getElementById('comments');

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

function checkName(minLength, div, feedback, box) {
	
	var el = document.getElementById(div);
	var elBox = document.getElementById(box);
	var elName = div[0].toUpperCase() + div.slice(1,-4) + ' ' + div.slice(-4);
	var elMsg = document.getElementById(feedback);
	
	// alphabetic characters, hyphens, and apostrophes allowed in name
	var regex = new RegExp("^[a-zA-Z-']{" + minLength + ",}$");
	//var regex = new RegExp(`^[a-zA-Z-']{${minLength},}$`);
	
	if (!el.value.match(regex)) {
		elBox.classList.add("has-error");
		elMsg.classList.add("help-block");
		elMsg.innerHTML = elName+' must be at least '+minLength+' characters and can contain only letters, apostrophes, and hyphens';
	}
	else
	{
		elBox.classList.remove("has-error");
		elBox.classList.add("has-success");
		elMsg.innerHTML = '';
	}
}

function checkEmail(div, feedback, box) {
	
	var el = document.getElementById(div);
	var elBox = document.getElementById(box);
	var elMsg = document.getElementById(feedback);
	
	var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	
	if (!el.value.match(regex)) {
		elBox.classList.add("has-error");
		elMsg.classList.add("help-block");
		elMsg.innerHTML = 'Invalid email format';
	}
	else
	{
		elBox.classList.remove("has-error");
		elBox.classList.add("has-success");
		elMsg.innerHTML = '';
	}
}

function checkPhone(div, feedback, box) {
	
	var el = document.getElementById(div);
	var elBox = document.getElementById(box);
	var elMsg = document.getElementById(feedback);
	
	var regex = /^[0-9]{10}$/;
	
	if (!el.value.match(regex)) {
		elBox.classList.add("has-error");
		elMsg.classList.add("help-block");
		elMsg.innerHTML = 'Enter a 10-digit phone number in the following format: XXXXXXXXXX';
	}
	else
	{
		elBox.classList.remove("has-error");
		elBox.classList.add("has-success");
		elMsg.innerHTML = '';
	}
}

function checkComments(div, feedback, box) {
	
	var el = document.getElementById(div);
	var elBox = document.getElementById(box);
	var elMsg = document.getElementById(feedback);
	
	if (el.value == '') {
		elBox.classList.add("has-error");
		elMsg.classList.add("help-block");
		elMsg.innerHTML = 'Cannot leave Comments section blank';
	}
	else
	{
		elBox.classList.remove("has-error");
		elBox.classList.add("has-success");
		elMsg.innerHTML = '';
	}
}

elFirstName.addEventListener('blur', function() {
	checkName(2,'firstName','fnFeedback','fnBox');
},false);
elLastName.addEventListener('blur', function() {
	checkName(2,'lastName','lnFeedback','lnBox');
},false);
elEmail.addEventListener('blur', function() {
	checkEmail('email','emFeedback','emBox');
},false);
elPhoneNum.addEventListener('blur', function() {
	checkPhone('phoneNumber','phFeedback','phBox');
},false);
elUsername.addEventListener('blur', function() {
	checkLength(6,'username','unFeedback','unBox');
},false);
elPassword.addEventListener('blur', function() {
	checkLength(6,'password','pwFeedback','pwBox');
},false);
elComments.addEventListener('blur', function() {
	checkComments('comments','comFeedback','comBox');
},false);




