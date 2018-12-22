<?php
function dequychuyenmuc($data,$parent_id =0)
{
    foreach ($data as $val) {
        $id = $val['id'];
        $name = $val['name'];
        if($val['parent_id'] != $parent_id) {
            echo $id;

//            echo "<option value='$id'>$name</option>";
//            echo $val['id'];
//            dequychuyenmuc($data,$val['id']);
        }
    }
}

?>