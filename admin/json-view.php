<?php

$string = file_get_contents("employee_data.json");
$json_a=json_decode($string,true);

print $json_a[1];
foreach($json_a as $key => $val) {
    echo "KEY IS: $key<br/>";
    foreach(((array)$json_a)[$key] as $val2) {
        echo "VALUE IS: $val2<br/>";
        print $key[1];
    }
}

?>
