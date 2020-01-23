<?php
    $abc=5;
    print nl2br("using paranthesis :".$abc."\n");
    print"Without using paranthesis print<br>";

    print"withour"." paranthesis $abc=5";
    print nl2br('using single quotes'.' paranthesis $abc=5\n');


    $bar = array("value" => "foo");
    print "this is {$bar['value']} !"; //accessing array element


    // print <<<END
   
    // asfsdffsdfgszdsfgfga
    // dfgfdgadf $abc gazdfgdfg
    // rrfgdgserrgrdgsz
    // END;

    // print <<<END
    //     This uses the "here document" syntax to output
    //     multiple lines with $abc interpolation. Note
    //     that the here document terminator must appear on a
    //     line with just a semicolon no extra whitespace!
    //     END;

    // print($abc);
?>