<?php

include_once ROOT.'/models/siteModel.php';

class SiteController
{
    public function actionStartpage()
    {
        siteModel::CreateDB();
        require_once(ROOT.'/views/viewMain.php');
        return true;
    }

    public function actionGet_categories(){
        siteModel::Get_categories();
        return true;
    }

    public function actionGet_model(){
        siteModel::Get_model($_POST);
        return true;
    }

    public function actionChoose(){
        siteModel::Choose_model($_POST);
        return true;
    }


}