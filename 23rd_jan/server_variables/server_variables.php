<?php

    $script = $_SERVER['SCRIPT_NAME'];
    echo $script;
?>


<form action="<?php  echo $script; ?>" method="POST">

    <input type="submit" name="submit" value="submit">

</form>