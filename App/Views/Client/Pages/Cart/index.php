<?php if (isset($_SESSION['cart_message'])): ?>
    <p style="color: green;"><?php echo $_SESSION['cart_message']; unset($_SESSION['cart_message']); ?></p>
<?php endif; ?>

<h2>Giỏ hàng</h2>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($cart)): ?>
            <?php foreach ($cart as $id => $item): ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo number_format($item['price'], 0, ',', '.'); ?> VND</td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?> VND</td>
                    <td>
                        <a href="/cart/remove/<?php echo $id; ?>">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Giỏ hàng của bạn hiện đang trống.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<a href="/products">Tiếp tục mua sắm</a>
