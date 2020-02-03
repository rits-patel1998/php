function validateFname(fname) {
    var letters = /^[a-zA-Z]+$/;
    if (fname === "" && !fname.match(letters)) {
        alert('enter valid name');
    }
    
}  

function validatelname(lname) {
    var letters = /^[a-zA-Z]+$/;
    if (lname === "" && !fname.match(letters)) {
        alert('enter valid last name');
    }
    
}  