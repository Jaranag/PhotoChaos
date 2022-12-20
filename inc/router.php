<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function loadContent($id_page) {
    if((!isset($id_page)) || $id_page=="") {
        $id_page="";
    }
    
    switch ($id_page) {
        case "":
            include 'inc/login.php';
            break;      
        default:
            include 'inc/error404.php';
            break;
    }
}