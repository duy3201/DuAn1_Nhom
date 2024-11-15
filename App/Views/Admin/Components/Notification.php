<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div class="page-wrapper" style="margin-top: 8%;">
            <?php
            if (isset($_SESSION['success'])) :
                foreach ($_SESSION['success'] as $value) :
            ?>
                <div class="alert alert-success alert-dismissible">
                    <strong><?= $value ?></strong>
                </div>
            <?php
                endforeach;
            endif;

            if (isset($_SESSION['error'])) :
                foreach ($_SESSION['error'] as $value) :
            ?>
                <div class="alert alert-danger alert-dismissible">
                    <strong><?= $value ?></strong>
                </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
        <?php
    }
}

?>
