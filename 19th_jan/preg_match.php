<?php
preg_match('/(ri)(tu)/', substr('My name is ritu patel.',6), $matches, PREG_OFFSET_CAPTURE);
print_r($matches);

// preg_match('/(foo)(bar)(baz)/', 'foobarbaz', $matches, PREG_OFFSET_CAPTURE);
// print_r($matches);


// preg_match('/(M)(Na)*(me)/','My name is ritu patel.',$matches, PREG_UNMATCHED_AS_NULL);
// print_r($matches);
?>