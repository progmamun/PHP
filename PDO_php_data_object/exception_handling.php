<?php
/*try{
//some code goes Here
}catch(){
//When any error comes in try code
}
$e->getLine(); line er error dekta
$e->getCode(); code er error check korta
$e->getFile();

 */

try {
    if (condition) {

    } else {
        throw new Exception("Some Message Goes Here");
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
