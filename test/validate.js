// function validateFname(fname) {
//     var letters = /[a-zA-Z]/;
//     if ( !fname.match(letters)) {
//         alert('enter valid name');
//     }
    
// }  

// function validateLname(lname) {
//     var letters = /[a-zA-Z]/;
//     if (lname === "" && (!lname.match(letters))) {
//         alert('enter valid last name');
//     }
    
// }  

// function validateEmail(email){
// 	var regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     if (regExp.test(String(email).toLowerCase())) {
//     	return True;
//     } 
//     else{
//     	 alert('enter valid ');
//     }
// }

function validateFields(){
	var formData = document.getElementById('formData');
	var firstname = formData.elements["user[firstname]"].value;
	var letters = /[a-zA-Z]+/;
    console.log("helo========="+firstname);

	if (firstname == ""  && (!firstname.match(letters))) {
		alert('enter valid name');
	}



	// console.log(document.getElementById("firstname").value);
}