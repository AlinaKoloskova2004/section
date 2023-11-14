




<!DOCTYPE html>
<html lang="en">


<!--  Design by foolishdeveloper.com -->


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <title>Team Section </title>
    <style media="screen">

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Exo;
        }
        @font-face {
            font-family: Exo;
            src: url(./fonts/Exo2.0-Medium.otf);
        }
        .main{
            width: 100%;
            height: 500px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .profile-card{
            position: relative;
            font-family: sans-serif;
            width: 220px;
            height: 300px;
            background: #fff;
            padding: 30px;
            border-radius: 100px;
            box-shadow: 0 0 22px #3336;
            transition: .6s;
            margin: 0 25px;
        }
        .profile-card:hover{
            border-radius: 10px;
            height: 260px;
        }
        .profile-card .img{
            position: relative;
            width: 100%;
            height: 100%;
            transition: .6s;
            z-index: 99;
        }
        .profile-card:hover .img{
            transform: translateY(-60px);
        }
        .img img{
            width: 170px;
            height:170px;
            border-radius: 50%;
            box-shadow: 0 0 22px #3336;
            transition: .6s;
        }
        .profile-card:hover img{
            border-radius: 10px;
        }
        .caption{
            text-align: center;
            transform: translateY(-80px);
            opacity: 0;
            transition: .6s;
        }
        .profile-card:hover .caption{
            opacity: 1;
        }
        .caption h3{
            font-size: 21px;
            font-family: sans-serif;
        }
        .caption p{
            font-size: 15px;
            color: #0c52a1;
            font-family: sans-serif;
            margin: 2px 0 9px 0;
        }
        .caption .social-links a{
            color: #333;
            margin-right: 15px;
            font-size: 21px;
            transition: .6s;
        }
        .social-links a:hover{
            color: #0c52a1;
        }


    </style>

</head>

<body>
<h1 class="d-flex justify-content-center" style="margin-top:30px;">Наши учителя</h1>
<div class="main">

    <?php foreach ($teachers as $teacher):?>
    <div class="profile-card">
        <div class="img">
            <img src="../img/<?php echo $teacher['img'];?>">
        </div>
        <div class="caption">
            <p><?php echo $teacher->surname.' '.$teacher->name.' '.$teacher->patronymic;?></p>
            <p style="font-weight: bold;color:rebeccapurple;"><?php echo $teacher->description;?></p>

        </div>

    </div>
    <?php endforeach;?>
</div>

</body>

</html>

