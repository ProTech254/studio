<?php
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();

if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
if($action == 'signup'){
	$save = $crud->signup();
	if($save)
		echo $save;
}
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_category"){
	$save = $crud->save_category();
	if($save)
		echo $save;
}
if($action == "save_design"){
	$save = $crud->save_design();
	if($save)
		echo $save;
}
if($action == "delete_category"){
	$save = $crud->delete_category();
	if($save)
		echo $save;
}
if($action == "delete_cat"){
	$save = $crud->delete_cat();
	if($save)
		echo $save;
}
if($action == "save_designer"){
	$save = $crud->save_designer();
	if($save)
		echo $save;
}
if($action == "delete_designer"){
	$save = $crud->delete_designer();
	if($save)
		echo $save;
}
if($action == "save_schedule"){
	$save = $crud->save_schedule();
	if($save)
		echo $save;
}
if($action == "set_appointment"){
	$save = $crud->set_appointment();
	if($save)
		echo $save;
}
if($action == "delete_appointment"){
	$save = $crud->delete_appointment();
	if($save)
		echo $save;
}





