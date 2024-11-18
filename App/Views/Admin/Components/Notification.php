<?php

namespace App\Views\Admin\Components;

use App\Views\BaseView;

class Notification extends BaseView
{
    public static function render($data = null)
    {
        ?>
        <div class="notification-wrapper">
            <?php if (isset($_SESSION['success'])) : ?>
                <?php foreach ($_SESSION['success'] as $key => $value) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $value ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])) : ?>
                <?php foreach ($_SESSION['error'] as $key => $value) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong><?= $value ?></strong>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <?php
    }
}
