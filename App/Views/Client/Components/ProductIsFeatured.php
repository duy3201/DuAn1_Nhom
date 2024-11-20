<?php

namespace App\Views\Client\Components;

use App\Views\BaseView;

class ProductIsFeatured extends BaseView
{
    public static function render($data = null)
    {
?>
       
        <?php
            foreach ($data as $item) :
            ?>
                                <div class="pi-pic">
                                    <img src="/public/assets/client/img/products/man-1.jpg" alt="">
                                    <div class="sale">Giảm giá</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                        <li class="quick-view"><a href="#">+ Xem nhanh</a></li>
                                        <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <div class="catagory-name"><?= $item['name'] ?></div>
                                    <a href="#">
                                        <h5><?= $item['name'] ?></h5>
                                    </a>
                                    <div class="product-price">
                                    <?= $item['name'] ?>
                                        <span>$35.00</span>
                                    </div>
                                </div>
                                
                            </div>
                            <?php
            endforeach;
            ?>
                          
<?php
    }
}
