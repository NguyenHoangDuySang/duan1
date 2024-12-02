<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if ($user == null) {
    die("Unauthorized access!");
}

if (!empty($_POST)) {
    $action = getPost('action');

    switch ($action) {
        case 'delete':
            deleteCategory();
            break;
    }
}

function deleteCategory() {
    $id = getPost('id');
    if (!is_numeric($id) || $id <= 0) {
        echo "ID không hợp lệ!";
        die();
    }

    // Kiểm tra xem danh mục có chứa sản phẩm không
    $sql = "SELECT COUNT(*) as total FROM Product WHERE category_id = $id AND deleted = 0";
    $data = executeResult($sql, true);

    $total = $data['total'];
    if ($total > 0) {
        echo "Danh mục đang chứa sản phẩm, không được xoá!";
        die();
    }

    // Xoá danh mục
    $sql = "DELETE FROM Category WHERE id = $id";
    execute($sql);
    echo "Danh mục đã được xoá thành công.";
}
