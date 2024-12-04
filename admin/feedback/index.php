<?php // Đặt tiêu đề trang và đường dẫn cơ bản cho các file liên quan
	$title = 'Quản Lý Phản Hồi';
	$baseUrl = '../';
	require_once('../layouts/header.php'); // Nhúng file header (chứa phần giao diện đầu trang)

	$sql = "select * from Feedback order by status asc, updated_at desc"; // Lấy danh sách các phản hồi từ cơ sở dữ liệu, sắp xếp theo trạng thái và thời gian cập nhật
	$data = executeResult($sql);// Lấy kết quả từ cơ sở dữ liệu dưới dạng danh sách
?>

<div class="">
    <h3 class="text-center mb-4">Quản Lý Phản Hồi</h3>

    <table class="table table-bordered table-hover" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Họ</th>
                <th>SĐT</th>
                <th>Email</th>
                <th>Chủ Đề</th>
                <th>Nội Dung</th>
                <th>Ngày Tạo</th>
                <th style="width: 120px"></th>
            </tr>
        </thead>
        <tbody>
            <?php
	$index = 0;
	foreach($data as $item) {
		echo '<tr>
					<th>'.(++$index).'</th>
					<td>'.$item['firstname'].'</td>
					<td>'.$item['lastname'].'</td>
					<td>'.$item['phone_number'].'</td>
					<td>'.$item['email'].'</td>
					<td>'.$item['subject_name'].'</td>
					<td>'.$item['note'].'</td>
					<td>'.$item['updated_at'].'</td>
					<td style="width: 50px">';
		if($item['status'] == 0) { // Nếu phản hồi chưa được đọc (status = 0), hiển thị nút "Đã Đọc"
			echo '<button onclick="markRead('.$item['id'].')" class="btn btn-success">Đã Đọc</button>';
		}	
		echo '</td>
        					<td style="width: 50px">
						<button onclick="deleteFeedback('.$item['id'].')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
	}
    
?>
        </tbody>
    </table>
</div>
</div>

<script type="text/javascript">
    // Hàm gửi yêu cầu "Đánh Dấu Đã Đọc" lên server
function markRead(id) {
    $.post('form_api.php', {
        'id': id,
        'action': 'mark' // Hành động đánh dấu đã đọc
    }, function(data) {
        location.reload()  // Tải lại trang sau khi hoàn tất
    })
}
function deleteFeedback(id) { // Hàm gửi yêu cầu "Xóa Phản Hồi" lên server
		option = confirm('Bạn có chắc chắn muốn xoá phản hồi này không?')
		if(!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete' // Hành động xóa phản hồi
		}, function(data) {
			location.reload()
		})
	}
</script>
<?php
	require_once('../layouts/footer.php');
?>