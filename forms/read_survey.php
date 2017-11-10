<?php

// proveri dali imame podatoci prateni preku POST metod
if (isset($_POST)){
    echo '<pre>';
    print_r($_POST);
    foreach ($_POST as $key => $value) {
//        if(is_array($value))
        if($key == 'pasttime') {
            echo '<pre>';
            print_r($value);
//            for($i=0; $i<count($value);$i++) {
//                echo "$key -- $value[$i]<br/>\n";
//            }
            foreach($value as $hobi) {
                echo "$key -- $hobi<br/>\n";
            }
        }
        else {
            echo "$key -- $value<br/>\n";
        }
    }
}
