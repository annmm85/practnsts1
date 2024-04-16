<?php

namespace Uplod;

class Uplod
{
    public function move_upl_file($direct_name): bool
    {
        $uniqfile = uniqid(). $_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], $direct_name . $uniqfile)){
            return true;
        }else{
            return false;
        }
    }
}
