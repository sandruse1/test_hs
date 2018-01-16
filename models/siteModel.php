<?php
include_once ROOT.'/models/ArticleModel.php';
class siteModel
{
    public static function CreateDB(){

        Db::createTable('category');
        Db::createTable('model');
        Db::createTable('article');

        if (!file_exists(ROOT.'/public/images')) {
            ArticleModel::insert_data();
        }
    }

    public static function Get_categories(){
        $pdo = Db::getConnection();
        $query = $pdo->prepare("SELECT category.name_category AS 'category', GROUP_CONCAT(model.name_model) AS 'models' FROM category, model WHERE model.id_category = category.id_category GROUP BY category.id_category");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }

    public static function Get_model($model){
        $pdo = Db::getConnection();
        $query = $pdo->prepare("SELECT model.name_model, model.prime_data_model, model.second_data_model, article.title_article, article.price_article, article.prime_data_article, article.img_article FROM model, article WHERE model.name_model = '".$model['model']."' AND article.id_model = model.id_model LIMIT 1");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }

    public static function Choose_model($model){
        $pdo = Db::getConnection();
        $query = $pdo->prepare("SELECT model.name_model, model.prime_data_model, model.second_data_model, article.title_article, article.price_article, article.prime_data_article, article.img_article FROM model, article WHERE model.name_model = '".$model['model']."' AND article.id_model = model.id_model AND article.title_article LIKE '".$model['what']."'");
        $query->execute();
        $result = $query->fetchAll();
        echo json_encode($result);
    }
}