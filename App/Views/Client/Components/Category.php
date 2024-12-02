<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class Category extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <ul class="filter-catagories">
            <li><a class="filter-catagories" href="/products">Tất cả</a></li>
            <?php
            if (is_array($data)) {
                foreach ($data as $item) {
                    ?>
                    <li><a href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
                    <?php
                }
            } else {
                echo "<li>Không có danh mục nào</li>";
            }
            ?>
        </ul>
        <?php
    }
}
