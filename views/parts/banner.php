

<section id="home">
    <div class="continer">
        <div id="carouselExampleIndicators" class="carousel slide row d-flex align-items-center justify-content-start" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php for($i = 0; $i < count($banner); $i++): ?>
                    <button type="button"
                            data-bs-target="#carouselExampleIndicators"
                            data-bs-slide-to="<?= $i ?>"
                            class="<?= $i === 0 ? 'active' : '' ?>"
                            aria-current="true"
                            aria-label="Slide <?= $i ?>"
                    ></button>
                <?php endfor; ?>
            </div>

            <div class="carousel-inner banner-content">
                <?php foreach($banner as $key => $slide): ?>
                    <div class="carousel-item <?= $key === 0 ? 'active' : '' ?>">
                        <h6><?= $slide['description'] ?? '' ?></h6>
                        <h1><?= $slide['title'] ?? '' ?></h1>
                        <?php if (!empty($slide['button']) && !empty($slide['button']['text'])): ?>
                            <a href="<?= $slide['button']['href'] ?? '#' ?>"
                               class="btn btn-outline-primary text-uppercase"><?= $slide['button']['text'] ?></a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>