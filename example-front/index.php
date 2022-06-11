<?php

    function getData($url) {
        $ch = curl_init();   
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   
        curl_setopt($ch, CURLOPT_URL, $url);   
        $res = curl_exec($ch);
        return json_decode($res);
    }

    $categories = getData("http://localhost:8000/api/categories");
    $posts = getData("http://localhost:8000/api/posts");
    
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            display: inline-block;
            margin-right: 10px;
        }
        .post-item{
            border: 1px solid gray;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1>Test Application</h1>
    <ul>
        <?php foreach ($categories->data->categoeies as $value) {
            ?>
                <li><?= $value->name ?></li>
            <?php
        } ?>
    </ul>

    <br>

    <div>
        <?php foreach ($posts->data->posts as $key => $value) {
            ?>
                <div class="post-item">
                    <h2><?= $value->title ?></h2>
                    <span><?= $value->created_at ?></span>
                    <p>
                        <?= $value->short_text ?>
                    </p>
                </div>
            <?php
        }?>
    </div>
    
</body>
</html>