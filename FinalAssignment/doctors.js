//initialize javascript file 
window.onload = function() {
 prepareListener();
}

//function to listen to when doctor license date is changed
function prepareListener() {
 var droppy;
 droppy = document.getElementById("datecheck");
 droppy.addEventListener("change",getDoctors);
}

//function called when date changed and form is submitted 
function getDoctors() {
 this.form.submit();
}
