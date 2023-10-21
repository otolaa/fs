<?php

return [
       'news/([a-z]+)/([0-9]+)'=>'news/view/$1/$2', // actionViews в NewsController
       'news/([0-9]+)'=>'news/detail/$1', // actionDetail в NewsController
       'news'=>'news/index', // actionIndex в NewsController

       'link_add'=>'main/Add', // actionAdd в MainController
       '([A-z-0-9]+)'=>'main/detail/$1', // actionDetail в MainController
       ''=>'main/index', // actionIndex в MainController
];