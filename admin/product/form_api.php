<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if($user == null) {
	die();
}

if(!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteProduct();
			break;
	}
}
function deleteProduct() {
	$id = getPost('id');
	$sql = "delete from Product where id = $id";
	execute($sql);
}
