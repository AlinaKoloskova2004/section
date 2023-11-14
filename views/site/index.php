<?php
use yii\helpers\Url;
use yii\bootstrap5\LinkPager;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<style>
    .btn{
        background-color:rebeccapurple;
        color:white;
    }
    .responsive-cell-block {
        min-height: 75px;
    }

    * {
        font-family: Nunito, sans-serif;
    }

    a {
        text-decoration-line: none;
        text-decoration-thickness: initial;
        text-decoration-style: initial;
        text-decoration-color: initial;
        color: inherit;
    }

    .text-blk {
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
        line-height: 25px;
    }

    .responsive-container-block {
        min-height: 75px;
        height: fit-content;
        width: 100%;
        display: flex;
        flex-wrap: nowrap;
        margin-top: 0px;
        margin-right: auto;
        margin-bottom: 0px;
        margin-left: auto;
        justify-content: flex-start;
        padding-top: 0px;
        padding-right: 0px;
        padding-bottom: 0px;
        padding-left: 0px;
    }

    .responsive-container-block.container {
        max-width: 1320px;
        flex-direction: column;
        text-align: center;
        align-items: center;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
    }

    .responsive-container-block.big-container {
        justify-content: center;
        padding-top: 0px;
        padding-right: 50px;
        padding-bottom: 0px;
        padding-left: 50px;
        overflow-x: hidden;
        overflow-y: hidden;
    }

    .text-blk.section-text {
        color: rgb(147, 147, 147);
        max-width: 750px;
        margin-top: 25px;
        margin-right: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        font-size: 18px;
        line-height: 27px;
    }

    .text-blk.section-head {
        max-width: 750px;
        font-size: 45px;
        line-height: 50px;
        font-weight: 700;
        margin-top: 0px;
        margin-right: 0px;
        margin-bottom: 10px;
        margin-left: 0px;
    }

    .responsive-cell-block.wk-ipadp-6.wk-tab-12.wk-mobile-12.wk-desk-6.content-one {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-6.wk-ipadp-12.img-one {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-6.wk-ipadp-12.content-one {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    @media (max-width: 1024px) {
        .responsive-container-block {
            flex-direction: column-reverse;
        }

        .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-6.wk-ipadp-12.content-one {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-6.wk-ipadp-12.img-one {
            display: flex;
            max-height: 300px;
            height: 100%;
            justify-content: center;
            align-items: center;
        }

        .bg-image {
            transform: rotateX(0deg) rotateY(0deg) rotateZ(-90deg) scaleX(1) scaleY(1) scaleZ(1);
            width: 100%;
        }

        .responsive-container-block.container {
            margin-top: 50px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }
    }

    @media (max-width: 768px) {
        .text-blk.section-text {
            font-size: 18px;
        }

        .text-blk.section-head {
            font-size: 40px;
            line-height: 45px;
        }
    }

    @media (max-width: 500px) {
        .text-blk.section-head {
            font-size: 30px;
            line-height: 35px;
        }

        .responsive-container-block.big-container {
            padding-top: 0px;
            padding-right: 30px;
            padding-bottom: 0px;
            padding-left: 30px;
        }

        .text-blk.section-text {
            font-size: 16px;
            line-height: 24px;
        }

        .responsive-cell-block.wk-tab-12.wk-mobile-12.wk-desk-6.wk-ipadp-12.img-one {
            max-height: 250px;
        }

        .responsive-container-block.container {
            margin-top: 0px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }

        .responsive-container-block.big-container {
            padding-top: 0px;
            padding-right: 20px;
            padding-bottom: 0px;
            padding-left: 20px;
        }

        .responsive-container-block.container {
            margin-top: 40px;
            margin-right: 0px;
            margin-bottom: 0px;
            margin-left: 0px;
        }
    }

</style>

<h2 style="margin: 15px 0 25px 0">Кружки для школьников разных возрастов</h2>



<div class="d-flex ">
    <div class="d-flex flex-column">
        <h5 style="font-weight: bold">Категории</h5>
        <div class="d-flex">
            <div>
                <?php foreach ($categories as $category):?>
                    <div class="card" style="width: 18rem; ">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a style="text-decoration:none;" href="<?php echo Url::toRoute(['site/contact' ,'id'=>$category['id']]) ;?>"><?php echo $category['name'];?></a></li>
                        </ul>
                    </div>

                <?php endforeach;?>
            </div>

            <div class="d-flex flex-wrap justify-content-around" style="width:1000px;">

                <?php foreach ($sections as $section):?>
                <div class="card " style="width: 400px; height: 250px; margin-left:80px; ">
                    <div class="card-body">
                        <img src="../img/<?php echo $section['img'];?>" class="card-img-top" style="height: 150px;" alt="...">
                        <h5 class="card-title"><?php echo $section['name'];?></h5>
                        <a href="<?php echo Url::toRoute(['site/about' ,'id'=>$section['id']]);?>" class="btn">Подробнее</a>
                    </div>
                </div>

                <?php endforeach;?>
                <div class="" style="margin-top:40px">
                    <?php echo LinkPager::widget([
                        'pagination'=>$pages]);?>
                </div>

            </div>


        </div>


    </div>

</div>
<div class="responsive-container-block big-container">
    <div class="responsive-container-block container">
        <div class="responsive-container-block">
            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-6 wk-ipadp-12 img-one">
                <img alt="golden-lines.png" class="image-block bg-image" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/golden%20lines.png" style="filter: hue-rotate(210deg)">
            </div>
            <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-6 wk-ipadp-12 content-one">
                <p class="text-blk section-head">
                    О нас
                </p>
                <p class="text-blk section-text">
                    На нашем сайте вы сможете найти разнообразные детские секции, которые помогут вашему ребенку развить свои способности и таланты. У нас представлены секции по хореографии, шахматам, живописи и многому другому. Мы работаем с опытными педагогами, которые владеют современными методиками обучения детей. Все занятия проходят в дружеской и атмосфере, где каждый ребенок получает индивидуальное внимание. Наша цель - помочь детям раскрыть свой потенциал, научиться работать в команде и развить уверенность в себе. Присоединяйтесь к нам и дайте вашему ребенку возможность самовыражаться и развиваться.
                </p>

            </div>
        </div>
    </div>
</div>





