<?php
/**
 * Created by PhpStorm.
 * User: sandruse
 * Date: 10.07.17
 * Time: 10:57
 */

$query = array(
    'createUser' => 'CREATE TABLE IF NOT EXISTS `user` (
                            id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL, 
                            login VARCHAR(60) NOT NULL, email VARCHAR(60) , 
                            passwd VARCHAR(500) NOT NULL, 
                            admin INT DEFAULT 0)',
    'createCategory' => 'CREATE TABLE IF NOT EXISTS `category` (
                            `id_category` INT (11) AUTO_INCREMENT,
                            `name_category` VARCHAR (250),
                            PRIMARY KEY (`id_category`))',
    'createModel' => 'CREATE TABLE IF NOT EXISTS `model` (
                            `id_model` INT (11) AUTO_INCREMENT ,
                            `id_category` INT(11),
                            `name_model` VARCHAR (100),
                            `prime_data_model` TEXT,
                            `second_data_model` TEXT,
                            PRIMARY KEY (`id_model`),
                            FOREIGN KEY (`id_category`) REFERENCES `category`(`id_category`))',
    'createArticle'=>'CREATE TABLE IF NOT EXISTS `article` (
                            `id_article` INT (11) AUTO_INCREMENT,
                            `id_model` INT(11),
                            `title_article` VARCHAR (250),
                            `price_article` INT (6),
                            `prime_data_article` TEXT,
                            `img_article` VARCHAR (250),
                            PRIMARY KEY (`id_article`),
                            FOREIGN KEY (`id_model`) REFERENCES `model`(`id_model`))',
    'insertUser' =>  'INSERT INTO `user` 
                            (login, email, passwd, admin) VALUES 
                            ("admin", "", "344907e89b981caf221d05f597eb57a6af408f15f4dd7895bbd1b96a2938ec24a7dcf23acb94ece0b6d7b0640358bc56bdb448194b9305311aff038a834a079f", 1)',
    'insertCategory' => 'INSERT INTO `category` (name_category) VALUES ("iPhone"), ("MacBook")',
    'insertModel' => 'INSERT INTO `model` (id_category, name_model, prime_data_model, second_data_model) 
                      VALUES (1, \'iPhone 6\', \'{"Screen diagonal": "4.7","CPU":"Apple A8","RAM":"1","Camera":"8 MP"}\', 
                      \'{"Built-in Memory" : ["16" , "32", "64"],"Color" : ["Gold", "Gray", "Silver"]}\'),
                      (1, "iPhone 7", \'{"Screen diagonal": "4.7","CPU":"Apple A10","RAM":"2","Camera":"12 MP"}\', 
                      \'{"Built-in Memory" : ["32", "128", "256"], "Color" : ["Gold", "Black", "Red"]}\' ), 
                      (1,  "iPhone 8", \'{"Screen diagonal": "4.7","CPU":"Apple A11 Bionic","RAM":"2","Camera":"12 MP"}\' , 
                      \'{"Built-in Memory" : ["64", "256"],  "Color" : ["Gold", "Gray", "Silver"]}\'),
                      (2,  "MacBook", \'{"Screen diagonal": "13.3","CPU":"Intel Core i5","RAM":"8","Operating System":"macOS Sierra"}\' , 
                      \'{"Type" : ["Air", "Pro"]}\')',
    'insertArticle' => 'INSERT INTO `article` (id_model, title_article,price_article, prime_data_article, img_article) 
                      VALUES (1, "16 GB Gold", 12000, \'{"Built-in Memory" : "16 GB","Color" : "Gold"}\', "6_gold.jpg"),
                      (1, "16 GB Gray", 12000, \'{"Built-in Memory" : "16 GB","Color" : "Gray"}\', "6_gray.jpg"),
                      (1, "16 GB Silver", 12000, \'{"Built-in Memory" : "16 GB","Color" : "Silver"}\', "6_silver.jpg"),
                      (1, "32 GB Gold", 13000, \'{"Built-in Memory" : "32 GB","Color" : "Gold"}\', "6_gold.jpg"),
                      (1, "32 GB Gray", 13000, \'{"Built-in Memory" : "32 GB","Color" : "Gray"}\', "6_gray.jpg"),
                      (1, "32 GB Silver", 13000, \'{"Built-in Memory" : "32 GB","Color" : "Silver"}\', "6_silver.jpg"),
                      (1, "64 GB Gold", 14000, \'{"Built-in Memory" : "64 GB","Color" : "Gold"}\', "6_gold.jpg"),
                      (1, "64 GB Gray", 14000, \'{"Built-in Memory" : "64 GB","Color" : "Gray"}\', "6_gray.jpg"),
                      (1, "64 GB Silver", 14000, \'{"Built-in Memory" : "64 GB","Color" : "Silver"}\', "6_silver.jpg"),
                      
                      (2, "32 GB Gold", 24000, \'{"Built-in Memory" : "32 GB","Color" : "Gold"}\', "7_gold.jpg"),
                      (2, "32 GB Black", 24000, \'{"Built-in Memory" : "32 GB","Color" : "Black"}\', "7_black.jpg"),
                      (2, "32 GB Red", 24000, \'{"Built-in Memory" : "32 GB","Color" : "Red"}\', "7_red.jpg"),
                      (2, "128 GB Gold",28000, \'{"Built-in Memory" : "128 GB","Color" : "Gold"}\', "7_gold.jpg"),
                      (2, "128 GB Black", 28000, \'{"Built-in Memory" : "128 GB","Color" : "Black"}\', "7_black.jpg"),
                      (2, "128 GB Red", 28000, \'{"Built-in Memory" : "128 GB","Color" : "Red"}\', "7_red.jpg"),
                      (2, "256 GB Gold", 32000, \'{"Built-in Memory" : "256 GB","Color" : "Gold"}\', "7_gold.jpg"),
                      (2, "256 GB Black", 32000, \'{"Built-in Memory" : "256 GB","Color" : "Black"}\', "7_black.jpg"),
                      (2, "256 GB Red", 32000, \'{"Built-in Memory" : "256 GB","Color" : "Red"}\', "7_red.jpg"),
                      
                      (3, "64 GB Gold", 26000, \'{"Built-in Memory" : "64 GB","Color" : "Gold"}\', "8_gold.jpg"),
                      (3, "64 GB Gray", 26000, \'{"Built-in Memory" : "64 GB","Color" : "Gray"}\', "8_gray.jpg"),
                      (3, "64 GB Silver", 26000, \'{"Built-in Memory" : "64 GB","Color" : "Silver"}\', "8_silver.jpg"),
                      (3, "256 GB Gold", 30000, \'{"Built-in Memory" : "256 GB","Color" : "Gold"}\', "8_gold.jpg"),
                      (3, "256 GB Gray", 30000, \'{"Built-in Memory" : "256 GB","Color" : "Gray"}\', "8_gray.jpg"),
                      (3, "256 GB Silver", 30000, \'{"Built-in Memory" : "256 GB","Color" : "Silver"}\', "8_silver.jpg"),
                      
                      (4, "Air", 43000, \'{"Type" : "Air"}\', "mac_book_air.jpg"),
                      (4, "Pro", 44000, \'{"Type" : "Pro"}\', "mac_book_pro.jpg")
                      
                      '
);

return ($query);
