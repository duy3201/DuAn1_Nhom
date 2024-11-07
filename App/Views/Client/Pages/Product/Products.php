<?php

namespace App\Views\Client\Pages\Product;

use App\Views\BaseView;

class Products extends BaseView
{
    public static function render($data = null)
    {
        $products = [
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "SHEIN Áo khoác denim", "price" => "508.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 2", "price" => "600.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 3", "price" => "700.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 4", "price" => "800.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 5", "price" => "900.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 6", "price" => "1.000.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 7", "price" => "1.100.000₫"],
            ["image" => "vdcs.jpg","btn" => "Thêm vào giỏ hàng", "title" => "Product 8", "price" => "1.200.000₫"],
        ];
    
        // Split the array into two rows of 4 items each
        $chunks = array_chunk($products, 4);

        ?>
            <style>
                .featured-products h5 {
                    font-weight: bold;
                    color: #333;
                }

                .product-card {
                    border-radius: 10px;
                    transition: transform 0.2s ease;
                }

                .product-card:hover {
                    transform: scale(1.05);
                }

                .card-title {
                    font-size: 1rem;
                    color: #333;
                }

                .card-text {
                    color: #ff8800; /* Ensure this color matches the site palette */
                    font-weight: bold;
                }
            </style>
        <?php
    
        echo '<section class="featured-products m-5 my-4">';
        echo '<h5 class="text-center mb-4">SẢN PHẨM NỔI BẬT</h5>';
    
        // Loop through each row
        foreach ($chunks as $chunk) {
            echo '<div class="row justify-content-center mb-3">';
    
            // Loop through each item in the current chunk
            foreach ($chunk as $product) {
                echo '<div class="col-6 col-md-3 mb-4">';
                echo '<article class="card product-card text-center">';
                echo '<img src="./public/img/' . $product['image'] . '" class="card-img-top rounded" alt="' . htmlspecialchars($product['title']) . '">';
                echo '<div class="card-body p-3">';
                echo '<h5 class="card-title fs-6 mb-2">' . htmlspecialchars($product['title']) . '</h5>';
                echo '<p class="card-text text-warning fw-bold fs-5">' . htmlspecialchars($product['price']) . '</p>';
                echo '<button class="btn btn-success">' . $product['btn'] . '</button>';
                echo '</div>';
                echo '</article>';
                echo '</div>';
            }
            echo '</div>';
        }
        echo '</section>';
    }
}
