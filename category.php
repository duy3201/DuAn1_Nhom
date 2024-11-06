<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Sản Phẩm</title>
    <style>
        /* Đặt kiểu nền và font chung cho trang */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Khung tổng của danh mục sản phẩm */
        .product-section {
            max-width: 1200px;
            text-align: center;
        }

        /* Tiêu đề danh mục */
        .product-section h2 {
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        /* Lưới chứa các thẻ sản phẩm */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Chia thành 4 cột */
            gap: 20px;
        }

        /* Thẻ sản phẩm */
        .product-card {
            position: relative;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        /* Ảnh sản phẩm */
        .product-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        /* Tạo hiệu ứng khi hover lên ảnh */
        .product-card:hover img {
            transform: scale(1.1);
        }

        /* Lớp phủ và tên sản phẩm */
        .product-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            text-align: center;
            padding: 10px 0;
            font-size: 1.2em;
            transition: background-color 0.3s ease;
        }

        /* Hiệu ứng khi hover */
        .product-card:hover .product-overlay {
            background-color: rgba(0, 0, 0, 0.7);
        }
    </style>
</head>
<body>

    <div class="product-section">
        <h2>Danh mục sản phẩm</h2>
        <div class="product-grid">
            <!-- Thẻ sản phẩm 1 -->
            <div class="product-card">
                <img src="/public/img/ao-phong-lv-023220-7.jpg" alt="Louis Vuitton">
                <div class="product-overlay">Louis Vuitton</div>
            </div>
            <!-- Thẻ sản phẩm 2 -->
            <div class="product-card">
                <img src="/public/img/ao-thun-couple-gucci.jpg" alt="Gucci">
                <div class="product-overlay">Gucci</div>
            </div>
            <!-- Thẻ sản phẩm 3 -->
            <div class="product-card">
                <img src="/public/img/20930114029-ao-vay-chanel-vai-tweed-chinh-hang.jpg" alt="Chanel">
                <div class="product-overlay">Chanel</div>
            </div>
            <!-- Thẻ sản phẩm 4 -->
            <div class="product-card">
                <img src="/public/img/vdcs.jpg" alt="Coach">
                <div class="product-overlay">Coach</div>
            </div>
        </div>
    </div>

</body>
</html>
