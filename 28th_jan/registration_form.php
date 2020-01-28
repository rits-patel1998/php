<?php

    require_once "register.php";

?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div id="containerMain">
            <form action="" method="POST">
                <div id="account" >
                    <div>
                        <label>Prefix : </label>
                        <select name="account[prefix]">
                            <?php $prefix = ['Mr','Miss','Mrs','Ms','Dr'];?>
                            <?php foreach ($prefix as $value) :?>
                                <?php $selected = in_array(getValue('account','prefix'),[$value]) ? "selected" : ''; ?>
                                <option value="<?php echo $value;?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                            
                    <div>
                        <label>First name : </label>
                        <input type="text" name="account[firstname]" value="<?php echo getValue('account','firstname'); ?>" ><label style="color: red;">required</label> <br><br>
                        
                    </div>
                    <div>
                        <label>Last name : </label>
                        <input type="text" name="account[lastname]"  value="<?php echo getValue('account','lastname'); ?>"><label style="color: red;">required</label> <br><br>
                
                    </div>
                    <div>
                        <label>Date of birth : </label>
                        <input type="date" name="account[dob]" value="<?php echo getValue('account','dob'); ?>"><br><br>
                
                    </div>
                    <div>
                    <label>Phone No : </label>
                         <input type="number" name="account[phoneno]" value="<?php echo getValue('account','phoneno'); ?>" >*<br><br>
                
                    </div>
                    <div>
                        <label>Email : </label>
                        <input type="text"  name="account[email]" value="<?php echo getValue('account','email');?>" ><label style="color: red;">required</label> <br><br>
                
                    </div>
                    <div>
                        <label>Password : </label>
                        Password : <input type="text" name="account[password]" value="<?php echo getValue('account','password'); ?>" ><label style="color: red;">required</label> <br><br>
                
                    </div>
                    <div>
                        <label>Confirm Password : </label>
                        <input type="text" name="account[confirmpassword]" value="<?php echo getValue('account','confirmpassword'); ?>" ><label style="color: red;">required</label> <br><br>
      
                    </div>
                   
                    
                </div>
                <div id="addressInfo">
                    <fieldset name="addressInfo">
                        <legend>Address Information</legend>   
                        <div>
                            <label>Address Line 1 : </label>
                            <input type="text" name="address[addressline1]" value="<?php echo getValue('address','addressline1'); ?>" >
                            <label style="color: red;">required</label> <br><br>
      
                        <div>
                        <div>
                            <label>Address Line 2 : </label>
                            <input type="text" name="address[addressline2]" value="<?php echo getValue('address','addressline2'); ?>" >
                            <label style="color: red;">required</label> <br><br>
      
                        <div>
                        <div>
                            <label>Company : </label>
                            <input type="text" name="address[company]" value="<?php echo getValue('address','company'); ?>" >
                            <label style="color: red;">required</label> <br><br>
      
                        <div>
                        <div>
                            <label>City : </label>
                            <input type="text" name="address[city]" value="<?php echo getValue('address','city'); ?>" >
                            <label style="color: red;">required</label> <br><br>
      
                        <div>        
                        <div>
                            <label>State : </label>
                            <input type="text" name="address[state]" value="<?php echo getValue('address','state'); ?>" >
                            <label style="color: red;">required</label> <br><br>
      
                        <div>

                        <div>
                            <label>Country : </label>  
                            <?php $countryArr=['India','USA','Iraq','Nepal','China']; ?>
                            <select name="address[country]">
                                <?php foreach ($countryArr as $value) :?>
                                    <?= $selected = in_array(getValue('address','country') , [$value]) ? "selected" : '';?>
                                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>

                                <?php endforeach;?>
                            </select><br><br>
                        </div>

                        <div>
                            <label>Postal code : </label>
                            <input type="number" name="address[postalcode]" value="<?php echo getValue('address','postalcode'); ?>" >
                            <label style="color: red;">required</label> <br><br>
                        </div>
                    </fieldset>

                </div>

                <input type="checkbox" name="checkbox" value="checkbox" onclick="showOtherInfo();">
                <label>Show Other Information</label><br><br>


                <div id="otherInfo">
                    <fieldset name="otherInfo">
                        <legend>Other Information</legend>   
                        <div>
                            <label>Describe Yourself : </label>
                            <textarea name="other[describe]" rows="5" cols="25"><?php echo getValue('other','describe')?></textarea>
                            <br><br>
                        </div>
                        <div>
                            <label>Profile Image : </label>
                            <input type="file" name="other[file]">
                            <br><br>
                        </div>
                        <div>
                            <label>How long have you been in business?  </label>
                            <?php $radioArr = ['under 1 year','1-2 year' , '2-5 year' ,'5-10 year','over 10 years'];?>
                            <?php foreach ($radioArr as $value) :?>
                                <?php $checked = in_array(getValue('other','business'),[$value]) ? 'checked' : '';?>
                                <input type="radio" name="other[business]" value="<?php echo $value; ?>" <?php echo $checked ?>><label><?php echo $value; ?></label>
                            <?php endforeach?>
                            <br><br>
                        </div>
                        <div>
                            <label>Number of unique clients you see each week? :  </label>
                            <?php $client = ['1-5','6-10','10-15','15+']; ?>
                            
                            <select name="other[client]">
                                <?php foreach ($client as $value) :?>
                                    <?= $selected = in_array(getValue('other','client') , [$value]) ? "selected" : '';?>
                                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>

                                <?php endforeach;?>
                            </select>
                            <br><br>
                        </div>
                        
                        <div>
                            <label >How do you like us to get in touch with you?</label>
                            <?php $medium = ['post','email','sms','phone']; ?>
                            <?php foreach ($medium as $value): ?>
                                <?php $selected = array_intersect(getValue('other','medium',[]) , [$value]) ? "checked" : '';?>
                                <input type="checkbox" name="other[medium][]" value="<?php echo $value; ?>" <?php echo $selected; ?>><label><?php echo $value?></label>
                            <?php endforeach;?>
                            <br><br>
                        </div>

                        <div>
                            <label>Hobbies :</label>
                            <select name="other[hobbies][]" multiple>
                                <?php $hobbies = ['Listening to music','Travelling','Bloging','Art']; ?>
                                <?php foreach ($hobbies as $value) :?>
                                    <?= $selected = array_intersect(getValue('other','hobbies',[]) , [$value]) ? "selected" : '';?>
                                    <option value="<?php echo $value; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>

                                <?php endforeach; ?>
                            </select><br><br>
                        </div>
                        
                        
                    </fieldset>

                </div>

            <input type="submit" name="submit" value="Register">

            </form>
        </div>
        <script src="registration_form.js"></script>
    </body>
</html>