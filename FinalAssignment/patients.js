//set up javascript file
window.onload = function() {
 prepareListener();
}

//function detects change in the pickpatients 
function prepareListener() {
 var droppy;
 droppy = document.getElementById("pickpatients");
 droppy.addEventListener("change",getPatients);
}

//call by above function and submits form when changed 
function getPatients() {
 this.form.submit();
}
