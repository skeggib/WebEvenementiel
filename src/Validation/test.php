<?php
    
$a = "32/32/32223";
$b = "12/12/2012";
$c = "12:23";


require("Validator.php");
require("ValidatorDate.php");

use WebEvents\Validation\ValidatorDate;

$val = new ValidatorDate();

print_r ($a.' --> '.$val->validate($a)."\n");
print_r ($b.' --> '.$val->validate($b)."\n");
print_r ($c.' --> '.$val->validate($c)."\n");
