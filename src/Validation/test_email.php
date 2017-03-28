<?php
    
$a = "anthony.vuillemin@outlook.fr";
$b = ",dgfsgsdfg";
$c = "ABC@lol.co.o";

require("ValidatorEmail.php");

use WebEvents\Validation\ValidatorEmail;

$val = new ValidatorEmail();

print_r ($a.' --> '.$val->validate($a)."\n");
print_r ($b.' --> '.$val->validate($b)."\n");
print_r ($c.' --> '.$val->validate($c)."\n");
