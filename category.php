<?php 
require_once('layouts/header.php');

// Bước 1: Lấy ID danh mục từ URL
$category_id = getGet('id'); // Hàm getGet('id') lấy giá trị của tham số id từ URL 

// Bước 2: Chuẩn bị câu truy vấn SQL
if($category_id == null || $category_id == '') { //Câu truy vấn SQL lấy dữ liệu từ bảng Product, kết hợp với bảng Category thông qua category_id.
	$sql = "select Product.*, Category.name as category_name 
	        from Product 
	        left join Category 
	        on Product.category_id = Category.id 
	        order by Product.updated_at desc limit 0,12"; 
            // Lấy tất cả sản phẩm, sắp xếp theo updated_at (thời gian cập nhật), và giới hạn 12 sản phẩm đầu tiên.
} else {
	$sql = "select Product.*, Category.name as category_name 
	        from Product 
	        left join Category 
	        on Product.category_id = Category.id 
	        where Product.category_id = $category_id 
	        order by Product.updated_at desc limit 0,12";
            // Lọc các sản phẩm có category_id trùng với giá trị trong URL.
}

// Bước 3: Thực thi câu truy vấn
$lastestItems = executeResult($sql); //dưới dạng mảng (array). Mỗi phần tử của mảng là một sản phẩm.

?>

<!-- Bước 4: Hiển thị sản phẩm -->
<div class="container" style="margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
	<?php
		foreach($lastestItems as $item) { //Vòng lặp foreach lặp qua từng sản phẩm trong danh sách $lastestItems và hiển thị  trong giao diện HTML.
			echo '<div class="col-md-3 col-6 product-item">
					<div>
					<a href="detail.php?id='.$item['id'].'">
						<img src="'.$item['thumbnail'].'" style="width: 100%; height: 220px;">
					</a>
					<p style="font-weight: bold;">'.$item['category_name'].'</p>
					<a href="detail.php?id='.$item['id'].'">
						<p style="font-weight: bold;">'.$item['title'].'</p>
					</a>
					<p style="color: red; font-weight: bold;">'.number_format($item['discount']).' VND</p>
					</div>
                    <div><p><button class="btn btn-success" onclick="addCart('.$item['id'].', 1)" style="width: 100%; border-radius: 0px;">
                            <i class="bi bi-cart-plus-fill"></i> Thêm giỏ hàng
                        </button></p></div>
				</div>';
		}
	?>
	</div>
</div>

<?php
require_once('layouts/footer.php');
?>
