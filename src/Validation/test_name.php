<?php
    
$a = "anthony.vuillemin@outlook.fr";
$b = ",dgfsgsdfg";
$c = "Bob";

require("ValidatorName.php");

use WebEvents\Validation\ValidatorName;

$val = new ValidatorName();

print_r ($a.' --> '.$val->validate($a)."\n");
print_r ($b.' --> '.$val->validate($b)."\n");
print_r ($c.' --> '.$val->validate($c)."\n");
