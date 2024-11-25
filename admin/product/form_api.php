<!-- Xử lý các hành động liên quan đến sản phẩm thông qua API, chủ yếu là xóa sản phẩm. -->
<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
// Kiểm tra xác thực: Dùng token để kiểm tra người dùng có hợp lệ hay không.
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
