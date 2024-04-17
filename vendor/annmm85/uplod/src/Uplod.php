<?php

namespace Uplod;

class Uplod
{
    public function move_upl_file($direct_name, $files, $uniqfile): bool|string
    {
        if(move_uploaded_file($files['image']['tmp_name'], $direct_name . $uniqfile)){
            return $uniqfile;
        }else{
            return false;
        }
    }
}
