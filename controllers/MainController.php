<?php

namespace Html\Controllers;

use Html\Models\NewsModel;
use Html\Models\LinksModel;
use Html\Components\Skin;

class MainController
{
    public function actionIndex()
    {
        // $this->add3news();
        $r = new NewsModel();
        $news = $r->getItemList();

        $l = new LinksModel();
        $link = $l->getItemList();

        echo Skin::render('layouts/index', [
            'title'=> 'Fs - Main',
            'content'=> Skin::render('includes/main', [
                'news'=>$news,
                'link'=>$link,
            ]),
        ]);

        return true;
    }

    public function actionDetail($slug)
    {
        $l = new LinksModel();
        $link = $l->getItemBySlug($slug);

        $this->location($link['url']);

        return true;
    }

    public function actionAdd()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['add_you_url']) {

            $url = htmlspecialchars($_POST['add_you_url']);

            $l = new LinksModel();
            try {
                $link_ = $l->addItem($url);
            } catch (\Exception $e) {
                $link_['error'] = $e->getMessage();
            }

            $this->renderJson($link_);
        }

        return true;
    }

    public function renderJson($arrJson)
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($arrJson, JSON_UNESCAPED_UNICODE );
    }

    public function add3news()
    {
        $r = new NewsModel();
        $r->addItem([':slug'=>'mikro_freworks', ':title'=>'Маленький очень маленький фреймворк Fs', ':description'=>'Возможно будит кому то интересен']);
        $r->addItem([':slug'=>'works_api', ':title'=>'Продолжается работа ад API', ':description'=>'Формируется новое АПИ']);
        $r->addItem([':slug'=>'Links_add', ':title'=>'Добавлена новая модель', ':description'=>'Links новая модель, таблица links']);
    }

    public function location($url)
    {
        header("Location: ".$url);
    }
}