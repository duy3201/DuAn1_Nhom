<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class CategoryMenu extends BaseView
{
    public static function render($data = null)
    {
?>

        <li><a class="filter-catagories" href="/products">Tất cả</a></li>
        <?php foreach ($data as $item) :
        ?>
            <li class="#"><a class="#" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a></li>
        <?php
        endforeach;
        ?>
<?php
    }
}
