<?php

/**
 * Created by PhpStorm.
 * User: sandruse
 * Date: 15.01.2018
 * Time: 20:40
 */
class ArticleModel
{
    public static function insert_data(){
        Db::insertTable('category');
        Db::insertTable('model');
        Db::insertTable('article');
        mkdir(ROOT . '/public/images', 0700);
        $url = ['https://i2.rozetka.ua/goods/1537987/apple_iphone_6_16gb_gold_images_1537987704.jpg',
            'https://i2.rozetka.ua/goods/1537989/apple_iphone_6_16gb_space_gray_images_1537989069.jpg',
            'https://i1.rozetka.ua/goods/1537988/apple_iphone_6_16gb_silver_images_1537988796.jpg',
            'https://i1.rozetka.ua/goods/1757075/apple_iphone_7_plus_128gb_black_images_1757075230.jpg',
            'https://i1.rozetka.ua/goods/1757075/apple_iphone_7_plus_128gb_gold_images_1757075776.jpg',
            'https://i1.rozetka.ua/goods/1890437/copy_apple_iphone_7_plus_128gb_gold_58d3a0d976f2e_images_1890437888.jpg',
            'https://i1.rozetka.ua/goods/2356298/apple_iphone_8_64gb_gold_images_2356298777.jpg',
            'https://i2.rozetka.ua/goods/2356299/apple_iphone_8_64gb_space_gray_images_2356299609.jpg',
            'https://i2.rozetka.ua/goods/2356299/apple_iphone_8_64gb_silver_images_2356299193.jpg',
            'https://i1.rozetka.ua/goods/2039371/copy_apple_mqd32ua_a_5938081862a2d_images_2039371644.jpg',
            'https://i2.rozetka.ua/goods/2039403/apple_mpxr2ua_a_images_2039403780.jpg'
        ];
        $img = ['6_gold.jpg', '6_gray.jpg', '6_silver.jpg',
            '7_black.jpg', '7_gold.jpg', '7_red.jpg',
            '8_gold.jpg', '8_gray.jpg', '8_silver.jpg', 'mac_book_air.jpg', 'mac_book_pro.jpg'];
        foreach ($url as $key => $value) {
            file_put_contents(ROOT . '/public/images/'.$img[$key], file_get_contents($value));
        }

    }
}