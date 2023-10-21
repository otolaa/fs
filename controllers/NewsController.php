<?php

namespace Html\Controllers;

use Html\Models\NewsModel;
use Html\Components\Skin;

class NewsController
{
    public function actionIndex()
    {
        $r = new NewsModel();
        $content = $r->getItemList();

        echo Skin::render('layouts/index', [
            'title'=> 'News',
            'content'=> Skin::render('includes/news', [
                'content'=>$content,
            ]),
        ]);

        return true;
    }

    public function actionView($category, $id)
    {
        echo "<pre>"; print_r($category); echo "</pre>";
        echo "<pre>"; print_r($id); echo "</pre>";

        return true;
    }

    public function actionDetail($id)
    {
        if ($id && intval($id) > 0) :

        $r = new NewsModel();
        $detail = $r->getItemById($id);

        echo Skin::render('layouts/index', [
            'title'=> 'Fs - '.$detail['title'],
            'content'=> Skin::render('includes/news_detail', [
                'detail'=>$detail,
            ]),
        ]);

        endif;
        return true;
    }
}