<?php use yii\helpers\Url;

;?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        *{
            margin:0px;
            padding:0px;
        }
        body{

        }
        .btn{
            background-color:rebeccapurple;
            color:white;
            position: absolute;
            left:650px;
            top: 550px;
        }
        h3{
            display:flex;
            justify-content: center;
            margin-top:20px;
        }

    </style>
</head>
<body>
<h3>"Детские секции - гармония развития и веселья!"</h3>
<img src="../img/m1.jpg" style="width: 100%;  height: 500px;">
<a href="<?php echo Url::toRoute(['site/index']);?>" class="btn">Перейти в каталог</a>

</body>
</html>
