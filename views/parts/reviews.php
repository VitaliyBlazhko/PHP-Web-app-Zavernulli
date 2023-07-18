<?php if (!empty($gallery)): ?>
    <div class="row title-row section-gap">
        <h1 class="mb-10"><?= $gallery['title'] ?></h1>
        <p><?= $gallery['description'] ?></p>
    </div>
<?php endif; ?>

<section id="reviews" class="section-gap">
    <div class="container">
        <?php if (!empty($reviews)): ?>
            <div class="row title-row section-gap">
                <h1 class="mb-10"><?= $reviews['title'] ?></h1>
                <p><?= $reviews['description'] ?></p>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 single-review">
                    <img src="<?= IMAGES_URI ?>/<?= $reviews['reviews']['0']['logo'] ?>" alt="">
                    <div class="title d-flex justify-content-between">
                        <h4><?= $reviews['reviews']['0']['name'] ?></h4>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                    <p>
                        <?= $reviews['reviews']['0']['text'] ?>
                    </p>
                </div>
                <div class="col-12 col-md-6 single-review">
                    <img src="<?= IMAGES_URI ?>/<?= $reviews['reviews']['1']['logo'] ?>" alt="">
                    <div class="title d-flex justify-content-between">
                        <h4><?= $reviews['reviews']['1']['name'] ?></h4>
                        <div class="star">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                    <p>
                        <?= $reviews['reviews']['1']['text'] ?>
                    </p>
                </div>
            </div>

            </div>
            <div class="row">
                <div class="col-3 catalog-item">
                    <div class="single-number">
                        <div class="title-div d-flex justify-content-between">
                            <h3><?= $reviews['reviews']['2']['numberFirst'] ?></h3>
                        </div>
                        <p><?= $reviews['reviews']['2']['clients'] ?></p>
                    </div>
                </div>
                <div class="col-3 catalog-item">
                    <div class="single-number">
                        <div class="title-div d-flex justify-content-between">
                            <h3><?= $reviews['reviews']['2']['numberSecond'] ?></h3>
                        </div>
                        <p><?= $reviews['reviews']['2']['projects'] ?></p>
                    </div>
                </div>
                <div class="col-3 catalog-item">
                    <div class="single-number">
                        <div class="title-div d-flex justify-content-between">
                            <h3><?= $reviews['reviews']['2']['numberAll'] ?></h3>
                        </div>
                        <p><?= $reviews['reviews']['2']['all'] ?></p>
                    </div>
                </div>
                <div class="col-3 catalog-item">
                    <div class="single-number">
                        <div class="title-div d-flex justify-content-between">
                            <h3><?= $reviews['reviews']['2']['numberTotal'] ?></h3>
                        </div>
                        <p><?= $reviews['reviews']['2']['total'] ?></p>
                    </div>
                </div>
            </div>
    <?php endif; ?>
</section>