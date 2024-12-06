<?php
    function conmeo(){
        echo ('conmeo');
    }


    function dequy($categories, $parent = 0, $str = ""){
        foreach ($categories as $key => $val) {
            if($val->parent_id == $parent) {
                echo "<div>".$str.$val->name."</div>";
                unset($categories[$key]);
                dequy($categories, $val->id, $str."---| ");
            }
        }
    }
?>