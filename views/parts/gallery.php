

<section id="gallery" class="section-gap">
    <div class="container">
        <?php if (!empty($gallery)): ?>
            <div class="row title-row section-gap">
                <h1 class="mb-10"><?= $gallery['title'] ?></h1>
                <p><?= $gallery['description'] ?></p>
            </div>
        <?php endif; ?>

        <div class="row">
            <?php if (!empty($gallery)): ?>
                <div class="col-12 col-md-4">
                    <img src="<?= IMAGES_URI ?>/<?= $gallery['gallery']['left']['0'] ?>" alt="" class="gallery-img">
                    <img src="<?= IMAGES_URI ?>/<?= $gallery['gallery']['left']['1'] ?>" alt="" class="gallery-img">
                </div>
                <div class="col-12 col-md-8">
                    <img src="<?= IMAGES_URI ?>/<?= $gallery['gallery']['right']['top']['0'] ?>" alt="" class="gallery-img">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <img src="<?= IMAGES_URI ?>/<?= $gallery['gallery']['right']['bottom']['0'] ?>" alt="" class="gallery-img">
                        </div>
                        <div class="col-12 col-md-6">
                            <img src="<?= IMAGES_URI ?>/<?= $gallery['gallery']['right']['bottom']['0'] ?>" alt="" class="gallery-img">
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>