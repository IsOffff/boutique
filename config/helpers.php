<?php

function my_md5($value) {

    return md5($value . 'HGVLUYLMTYCFMIYGVMIJHCLUTCjbjh876875LUY');
}

function price($price) {
    return number_format($price / 100, 2, ',', ' ');
}