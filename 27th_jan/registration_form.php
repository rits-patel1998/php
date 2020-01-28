<?php
    if (isset($_POST['submit'])) {
        
        $prefix = $_POST['prefix']; 
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $dob = $_POST['dob'];
        
        $phoneno = $_POST['phoneno'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $addressline1 = $_POST['addressline1'];
        $addressline2 = $_POST['addressline2'];
        $company = $_POST['company'];
        $city = $_POST['company'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        // echo $country;
        $postal = $_POST['postalcode'];


        $describe = $_POST['describe'];
        // $img = $_POST['image'];
        $business = $_POST['business'];
        $client = $_POST['client'];
        $medium= $_POST['medium'];
        foreach ($medium as $value) {
            echo $value;
        }

        $hobbies = $_POST['hobbies'];
        
             

        
        // function showInfo(){
               
        // }
        
        // function validateFields($prefix, $firstname, $lastname, $phoneno, 
        //     $email, $password, $confirmpassword, $addressline1, 
        //     $country,  $postal,$chkList){
            $cnt = 0;
            if (!empty($prefix)) {
                $cnt++;
            }
            else{
                echo "select prefix first";
            }

            $reg = '/[A-za-z]/';
            
            if (!empty($firstname) && preg_match('/[A-za-z]/',$firstname)) {
                $cnt++;
            }
            else{
                echo "enter valid name";
            }

            if (!empty($lastname) && preg_match('/[A-za-z]/',$lastname)) {
                $cnt++;
            }
            else{
                echo "enter valid last name";
            }

            if( !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $cnt++; 
            }
            else{
                echo "Enter valid Email address";
            }


            if (!empty($phoneno) && strlen($phoneno) <= 10) {
                $cnt++;
            }
            else{
                echo "Enter valid phone no";
            }

            if ($addressline1 != "") {
                $cnt++;
                echo "$cnt";
            }
            else {
                echo "Enter address";
            }

            if (!empty($country)) {
                $cnt++;
                echo "$cnt";
            }
            else{
                echo "select country";
            }

            if (!empty($postal) && strlen($postal) == 6) {
                $cnt++;
                echo "$cnt";
            }
            else {
                echo "enter valid postal code";
            }
            
            
            if ($password == $confirmpassword) {
                $cnt++;
                echo "$cnt";
            }
            else {
                echo "Password and confirm password does not match";
            }

            // if(empty($chkList)) {
            //     echo "please select at least one choice";
            // }
            // else {
            //     $cnt++;
            //     echo "$cnt";
            // }

        

            if ( $cnt == 9) {
               echo "<script>alert('registration successfull');</script>";
            //    showInfo();

                $_SESSION['prefix'] =  $prefix;
                $_SESSION['firstname'] =  $firstname;
                $_SESSION['lastname'] =  $lastname;
                $_SESSION['dob'] =  $dob;
                
                $_SESSION['phoneno'] =  $phoneno;
                $_SESSION['email'] =  $email;
                $_SESSION['password'] =  $password;
                $_SESSION['addressline1'] =  $addressline1;
                
                $_SESSION['addressline2'] =  $addressline2;
                $_SESSION['company'] =  $company;
                $_SESSION['city'] =  $city;
                $_SESSION['state'] =  $state;
                $_SESSION['country'] =  $country;
                $_SESSION['postal'] =  $postal;

                
                $_SESSION['describe'] =  $describe;
                // $_SESSION['image'] =  $img;
                $_SESSION['business'] =  $business;
                $_SESSION['client'] =  $client;
                
                $_SESSION['medium'] =  $medium;
                print_r($medium);
                $_SESSION['hobbies'] =  $hobbies;
                
                print_r($_SESSION);  
            }

        
        
        // }

        
        // validateFields($prefix, $firstname, $lastname, $phoneno, 
        //     $email, $password, $confirmpassword,$addressline1, 
        //     $country,  $postal,$medium);
        
    }


?>

<!DOCTYPE html>
<html>


    <body>
        <form method="POSt" action="">
            <fieldset name="accountInfo">
                <legend>Account Details</legend>

                <select name="prefix">
                    <option disabled="" selected="">Select option</option>
                    <option value="Mr" <?php if(isset($_POST['submit'])) {if ($_SESSION['prefix'] == 'Mr') {echo ' selected ';}} ?>>Mr</option>
                    <option value="Miss" <?php if(isset($_POST['submit'])) {if ($_SESSION['prefix'] == 'Miss') {echo ' selected ';}} ?>>Miss</option>
                    <option value="Ms" <?php if(isset($_POST['submit'])) {if ($_SESSION['prefix'] == 'Ms') {echo ' selected ';}}?>>Ms</option>
                    <option value="Mrs" <?php if(isset($_POST['submit'])) {if ($_SESSION['prefix'] == 'Mrs') {echo ' selected ';}}?>>Mrs</option>
                    <option value="Dr" <?php if(isset($_POST['submit'])) {if ($_SESSION['prefix'] == 'Dr') {echo ' selected ';}}?>>Dr</option>
                </select>

                First name : <input type="text" value="<?php if (isset($_POST['submit'])) {echo $_SESSION['firstname'];}  ?>" name="firstname"><label style="color: red;">required</label> <br><br>
                Last name : <input type="text" name="lastname"  value="<?php if(isset($_POST['submit'])) {echo $_SESSION['lastname'];} ?>"><label style="color: red;">required</label> <br><br>
                
                Date of Birth : <input type="date" name="dob" value="<?php if(isset($_POST['submit'])) {echo $_SESSION['dob'];} ?>"><br><br>
                Phone No : <input type="number"  value="<?php if(isset($_POST['submit'])) {echo $_SESSION['phoneno'];} ?>" name="phoneno">*<br><br>
                Email : <input type="text"  value="<?php if(isset($_POST['submit'])) {echo $_SESSION['email'];} ?>" name="email"><label style="color: red;">required</label> <br><br>
                Password : <input type="text"  value="<?php  if(isset($_POST['submit'])) {echo $_SESSION['password']; }?>" name="password"><label style="color: red;">required</label> <br><br>
                Confirm Password : <input type="text"  value="<?php if(isset($_POST['submit'])) { echo $confirmpassword;} ?>" name="confirmpassword"><label style="color: red;">required</label> <br><br>

            </fieldset>
            <br><br>

            <fieldset name="addressInfo">
                <legend>Address Information</legend>

                
                Address : <input type="text" name="addressline1"  value="<?php  if(isset($_POST['submit'])) {echo $_SESSION['addressline1'];} ?>" placeholder="address line 1">
                <label style="color: red;">required</label> 
                <input type="text" name="addressline2"  value="<?php  if(isset($_POST['submit'])) {echo $_SESSION['addressline2']; }?>" placeholder="address line 2">
                <label style="color: red;">required</label> <br><br>
                
                Company : <input type="text"  value="<?php  if(isset($_POST['submit'])) { echo $company;} ?>" name="company"><br><br>
                City : <input type="text"  value="<?php  if(isset($_POST['submit'])) { echo $_SESSION['city'];} ?>" name="city"><br><br>
                State : <input type="text" value="<?php  if(isset($_POST['submit'])) { echo $_SESSION['state'];} ?>" name="state"><br><br>
                Country :   
                <select name="country">
                    <option disabled="" selected="">Select option</option>
                    <option value="india" <?php if(isset($_POST['submit'])) { if ($_SESSION['country'] == 'india') {echo ' selected ';}} ?>>india</option>
                    <option value="china" <?php  if(isset($_POST['submit'])) {if ($_SESSION['country'] == 'china') {echo ' selected ';}} ?>>china</option>
                    <option value="iraq" <?php  if(isset($_POST['submit'])) {if ($_SESSION['country'] == 'iraq') {echo ' selected ';}} ?>>iraq</option>
                    <option value="afghanistan" <?php  if(isset($_POST['submit'])) {if ($_SESSION['country'] == 'afghanistan') {echo ' selected ';}} ?>>afghanistan</option>
                    <option value="USA" <?php  if(isset($_POST['submit'])) {if ($_SESSION['country'] == 'USA') {echo ' selected ';}} ?>>USA</option>
                </select>
                <label style="color: red;">required</label> 
                <br><br>
                Postal code : <input type="number"  value="<?php echo $_SESSION['postal']; ?>" name="postalcode">
                <label style="color: red;">required</label> <br><br>

            </fieldset><br><br>
            
            <input type="checkbox" name="checkbox" value="checkbox" onclick="showOtherInfo();">
            <label>Show Other Information</label>

            <br><br>
            

            <div id = "otherInfo">
            
                <fieldset name="">
                    <legend>Other Information</legend>

                    Describe Yourself :<textarea name="describe" rows="5" cols="25"><?php if(isset($_POST['submit'])) { echo $_SESSION['describe'] ;} ?></textarea><br><br>
                    Profile Image : <input type="file" name="file"><br><br>

                    How long have you been in business? <br>
                    <input type="radio" name="business" value="under 1 year"<?php if(isset($_POST['submit'])) { if ($_SESSION['business'] == 'under 1 year') {echo ' checked ';}}?>><label>under 1 year</label>
                    <input type="radio" name="business" value="1-2 year"<?php if(isset($_POST['submit'])) { if ($_SESSION['business'] == '1-2 year') {echo ' checked ';}}?>><label>1-2 year</label>
                    <br>
                    <input type="radio" name="business" value="2-5 year" <?php if(isset($_POST['submit'])) { if ($_SESSION['business'] == '2-5 year') {echo ' checked ';}}?>><label>2-5 year</label>
                    <input type="radio" name="business" value="5-10 year"<?php if(isset($_POST['submit'])) { if ($_SESSION['business'] == '5-10 year') {echo ' checked ';}}?>><label>5-10 year</label><br>
                    <input type="radio" name="business" value="Over 10 year"<?php if(isset($_POST['submit'])) { if ($_SESSION['business'] == 'Over 10 year') {echo ' checked ';}}?>><label>Over 10 year</label>
                    <br><br>
                
                
                
                    Number of unique clients you see each week? :
                    <select name="client">

                        <option disabled="" selected="">Select option</option>
                        <option value='1-5' <?php if(isset($_POST['submit'])) {if ($_SESSION['client'] == '1-5') {echo ' selected ';}} ?>>1-5</option>
                        <option value='6-10' <?php if(isset($_POST['submit'])) {if ($_SESSION['client'] == '6-10') {echo ' selected ';}} ?>>6-10</option>
                        <option  value='11-15' <?php if(isset($_POST['submit'])) {if ($_SESSION['client'] == '11-15') {echo ' selected ';}} ?>>11-15</option>
                        <option  value='15+' <?php if(isset($_POST['submit'])) {if ($_SESSION['client'] == '15+') {echo ' selected ';}}?>>15+</option>
                    </select>
                    <br><br>
                    
                    How do you like us to get in touch with you?<label style="color: red;">required</label> <br>
                    <input type="checkbox" value="post" name="medium[]" <?php if(isset($_POST['submit'])) { if(in_array($_SESSION['medium'], medium[])) if ($_SESSION['medium'] == 'post') {echo 'selected';}}} ?>><label>Post</label>
                    <input type="checkbox" value="email" name="medium[]" <?php if(isset($_POST['submit'])) {if ($_SESSION['medium'] == 'email') {echo ' selected ';}} ?>><label>Email</label>
                    <br>
                    <input type="checkbox" value="sms" name="medium[]" <?php if(isset($_POST['submit'])) {if ($_SESSION['medium'] == 'sms') {echo ' selected ';}} ?>><label>SMS</label>
                    <input type="checkbox" value="phone" name="medium[]" <?php if(isset($_POST['submit'])) {if ($_SESSION['medium']== 'phone') {echo ' selected ';}} ?>><label>Phone</label><br><br>
                    
                    
                    Hobbies :
                    <select name="hobbies" multiple>
                        <option disabled="" selected="">Select option</option>
                        <option>Listening to music</option>
                        <option>Travelling</option>
                        <option>Bloging</option>
                    
                        <option>Art</option>
                    </select>
                    <br><br>
                </fieldset>
            
            </div>

            <input type="submit" name="submit" value="Submit">
            <script src="registration_form.js"></script>
        
        </form>

    </body>
</html>