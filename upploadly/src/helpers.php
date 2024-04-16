<?php
namespace Uplod;


function uplodition(string $direct_name = '', array $files = [], string $uniqfile = ''): Uplod
{
    return new Uplod($direct_name, $files, $uniqfile);
}
