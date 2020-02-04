function validateFname(fname) {
    var letters = /[a-zA-Z]/;
    if (fname === "" && (!fname.match(letters))) {
        alert('enter valid name');
    }
    
}  

function validateLname(lname) {
    var letters = /^[a-zA-Z]+$/;
    if (lname === "" && (!lname.match(letters))) {
        alert('enter valid last name');
    }
    
}  