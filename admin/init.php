<?php

include('connect.php');
// sort(array(5,6,7,2,0),SORT_REGULAR);
$template="includes/templates/";
$functions="includes/functions/";
$languages="includes/languages/";
$libraries="includes/libraries/";


$css='layout/css/';
$js='layout/js/';
$images='layout/images/';

//include important file
include $languages.'en.php' ;
include $template.'header.php';

//include nav on all expect with noNavbar variable

if(!isset($noNavbar)){
    include $template.'navbar.php';
}