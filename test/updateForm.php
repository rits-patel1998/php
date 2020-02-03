<?php

    require_once "update.php";
?>

<html>

    <body>
        <form method="POST" action="">
        <script src="validate.js"></script>
            <div>
                <h2>REGISTRATION PAGE</h2>
            </div>
            <div id="user" >
           
                <div>
                    <label>Prefix : </label>
                    <select name="user[prefix]">
                        <?php $prefix = ['Mr','Miss','Mrs','Ms','Dr'];?>
                        <?php foreach ($prefix as $value) :?>
                            <?php $selected = in_array(getValue('user','prefix'),[$value]) ? "selected" : ''; ?>
                            <option value="<?php echo $value;?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                            <?php endforeach;?>
                    </select><br><br>
                </div>
                                    
                <div>
                    <label>First name : </label>
                    <input type="text" name="user[firstname]" value="<?php 
                        echo getValue('user','firstname'); ?>" onblur="validateFname(this.value);">
                    <label style="color: red;" name="firstnameError" ><br><br>
                                
                </div>
                <div>
                    <label>Last name : </label>
                    <input type="text" name="user[lastname]"  value="<?php 
                        echo getValue('user','lastname'); ?>" onblur="validatelname(this.value)>
                    <label style="color: red;" name="lastnameError" ><br><br>
                                    
                </div>
                <div>
                    <label>Email : </label>
                    <input type="text"  name="user[email]" value="<?php                         echo getValue('user','email');?>" >
                    <label style="color: red;" name="emailError" ><br><br>
                </div>

                
                <div>
                    <label>Phone No : </label>
                    <input type="text"  name="user[phoneno]" value="<?php 
                        echo getValue('user','email');?>" >
                    <label style="color: red;" name="phonenoError" ><br><br>
                </div>
                <div>
                    <label>Password : </label>
                    <input type="text" name="user[password]" value="<?php echo getValue('customer','password'); ?>" >
                    <label style="color: red;"></label> <br><br>
                        
                </div>
                <div>
                    <label>Confirm Password : </label>
                    <input type="text" name="user[confirmpassword]" value="<?php 
                        echo getValue('user','confirmpassword'); ?>" >
                    <label style="color: red;" name="passwordError" >
                </div>
                
                
                <div>
                    <label>Information : </label>
                    <textarea name="user[information]"><?php 
                        echo getValue('user','information'); ?></textarea>
                    <label style="color: red;" name="informationError" >
                </div>

                <div>
                    
                    <input type="checkbox" name="termsCondition" >
                    <label for="termsCondition">Hereby ,I accept Terms and Conditions </label>
                    
                    <label style="color: red;" name="informationError" >
                </div>
                            
            </div>

            <br><br>
            <input type="submit" name="update" value="Register">
                        
        </form>
       
    </body>
</html>