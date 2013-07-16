<?php   
require_once 'jcart/jcart.php';
session_start();
include("templates/header.php");   

// Set the default name 
$action = 'welcome'; 
// Specify some disallowed paths 
$disallowed_paths = array('header', 'footer',); 
if (!empty($_GET['action'])) { 
    $tmp_action = basename($_GET['action']); 
    // If it's not a disallowed path, and if the file exists, update $action 
    if (!in_array($tmp_action, $disallowed_paths) && file_exists("pages/{$tmp_action}.php")) {
        $action = $tmp_action; } else { $action = '404'; }

} 


// Include $action 
include("pages/$action.php"); 

include("templates/footer.php");