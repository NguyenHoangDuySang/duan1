<?php require_once 'layout/header.php';?>
<?php require_once 'layout/menu.php';?>

<style>
    .contact-section {
        max-width: 650px;
        margin: 60px auto;
        background-color: #fff;
        padding: 35px;
        border-radius: 12px;
        box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        font-family: 'Segoe UI', sans-serif;
    }

    .contact-section h1 {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
    }

    .contact-section form div {
        margin-bottom: 20px;
    }

    .contact-section label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #34495e;
    }

    .contact-section input[type="text"],
    .contact-section input[type="email"],
    .contact-section textarea {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: 0.3s;
    }

    .contact-section input:focus,
    .contact-section textarea:focus {
        border-color: #3498db;
        box-shadow: 0 0 6px rgba(52, 152, 219, 0.3);
        outline: none;
    }

    .contact-section textarea {
        resize: vertical;
        min-height: 120px;
    }

    .contact-section button[type="submit"] {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 12px;
        width: 100%;
        font-size: 16px;
        font-weight: bold;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .contact-section button[type="submit"]:hover {
        background-color: #2980b9;
    }

    .contact-section .success {
        color: #27ae60;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }

    .contact-section .error {
        color: #e74c3c;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }
</style>

<!-- Liên hệ -->
<div class="contact-section">
    <h1>Liên Hệ Với Chúng Tôi</h1>

    <form action="<?= BASE_URL ?>?act=send-contact" method="POST">
        <div>
            <label for="name">Họ và Tên:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="message">Lời Nhắn:</label>
            <textarea id="message" name="message" required></textarea>
        </div>
        <button type="submit">Gửi Liên Hệ</button>
    </form>

    <?php if (isset($_SESSION['success_message'])): ?>
        <p class="success"><?php echo $_SESSION['success_message']; unset($_SESSION['success_message']); ?></p>
    <?php elseif (isset($_SESSION['error_message'])): ?>
        <p class="error"><?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?></p>
    <?php endif; ?>
</div>

<?php require_once 'layout/miniCart.php'; ?>
<?php require_once 'layout/footer.php'; ?>
