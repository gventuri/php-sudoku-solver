<?php
// Create a list of comma-separated ints from the starting multi-dimensional array. This is useful to compare the expected solution and the real solution
function implodeGrid($grid){
    return implode(array_map(function($items){ return implode($items, ','); }, $grid), ",");
}

// Very simple php testing functions
function test($condition, $error){
    if(!$condition) throw new Exception($error);
}
function testFunction($function, $success, $error){    
    try{
        $errors = [];

        $condition = !$function();
        test($condition, $error);
    } catch (Exception $e) {
        $errors[] = $e->getMessage();
    } finally {
        if(count($errors)){
            foreach($errors as $e){
                echo "\n", $e;
            }
        }else{
            echo "\n", $success;
        }        
    }
}