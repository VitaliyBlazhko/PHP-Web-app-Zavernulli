<section id="about-us" class="section-gap">
    <div class="conteiner">
        <div class="row">
        <?php if (!empty($aboutUs['video']['image'])): ?>
            <div class="col-6 video d-flex align-items-center justify-content-center">
                <img src="<?= IMAGES_URI ?>/<?= $aboutUs['video']['image'] ?>" class="video-img">
                <a href="#" class="play">
                    <img src="<?= IMAGES_URI ?>/progect%20doner/play-icon.png"/>
                </a>
            </div>
        <?php endif; ?>
            <?php if (!empty($aboutUs['description'])): ?>
                <div class="col-6 video-right d-flex flex-column align-items-start justify-content-center">
                    <h6><?= $aboutUs ['description']['pre_title']?? '' ?></h6>
                    <h1><?= $aboutUs ['description']['title']?? '' ?></h1>
                    <p><span><?= $aboutUs ['description']['quote']?? '' ?></span></p>
                    <p><?= $aboutUs ['description']['text']?? '' ?></p>
                    <img class="img-fluid" src="<?= IMAGES_URI ?>/<?= $aboutUs['description']['sign'] ?>" alt="">
                </div>
            <?php endif; ?>
</section>


<!--[video] => Array-->
<!--(-->
<!--[image] => progect doner/nev/123456.jpg-->
<!--[url] => #-->
<!--)-->
<!---->
<!--[description] => Array-->
<!--(-->
<!--[pre_title] => The best ingredients-->
<!--[title] => High quality and delisious-->
<!--[quote] => quick and tasty-->
<!--[text] => check it yourself-->
<!--[sign] => progect%20doner/nev/123456.jpg-->
<!--)-->