<?php
session_start();// Bắt đầu phiên làm việc
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');// Chứa các hàm để thao tác với cơ sở dữ liệu


$user = getUserToken(); // Lấy thông tin người dùng dựa trên token
if($user == null) {
	die();// Nếu người dùng chưa đăng nhập, dừng chương trình
}

if(!empty($_POST)) { // Kiểm tra xem dữ liệu có được gửi qua phương thức POST hay không
	$action = getPost('action');

	switch ($action) {
		case 'mark': ///"mark", đánh dấu phản hồi đã đọc
			readFeedback();
			break;

			case 'delete':
				deleteProduct(); // Xóa phản hồi
				break;

	}
	
}
// Hàm đánh dấu phản hồi là đã đọc
function readFeedback() {
	$id = getPost('id');    // Lấy ID phản hồi từ dữ liệu POST
	$updated_at = date("Y-m-d H:i:s");   // Lấy thời gian hiện tại để cập nhật
	$sql = "update Feedback set status = 1, updated_at = '$updated_at' where id = $id";  // Câu truy vấn cập nhật trạng thái phản hồi
	execute($sql);    // Thực thi truy vấn
}

// Hàm xóa phản hồi
function deleteProduct() {
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "DELETE FROM Feedback WHERE id = $id";    // Câu truy vấn xóa phản hồi khỏi cơ sở dữ liệu
	execute($sql);   // Thực thi truy vấn
}