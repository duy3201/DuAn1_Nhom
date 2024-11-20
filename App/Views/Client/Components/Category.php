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
            foreach ($data as $item) :
            ?>
                <li><a class="" href="/products/categories/<?= $item['id'] ?>"><?= $item['name'] ?></a></li>

            <?php
            endforeach;
            ?>
        </ul>
<?php
    }
}
