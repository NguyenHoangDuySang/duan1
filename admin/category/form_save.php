<?php
if (!empty($_POST)) {
    $id = getPost("id");
    $name = getPost("name");

    if (empty($name)) {
        echo "Tên danh mục không được để trống!";
        die();
    }

    $name = htmlspecialchars($name, ENT_QUOTES);

    if (!empty($id) && is_numeric($id)) {
        // Cập nhật danh mục
        $sql = "UPDATE Category SET name = '$name' WHERE id = $id";
        execute($sql);
    } else {
        // Thêm mới danh mục
        $sql = "INSERT INTO Category(name) VALUES ('$name')";
        execute($sql);
    }
}
