
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-6">
                <div class="footer-widget">
                    <?php if (!empty($mainFields['footer']['about_us'])): ?>
                        <h6><?= $mainFields['footer']['about_us']['title'] ?? '' ?></h6>
                        <p><?= $mainFields['footer']['about_us']['description'] ?? '' ?></p>
                    <?php endif; ?>
                    <p class="copyright"><?= $mainFields['footer']['copyright'] ?? '' ?></p>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-6">
                <div class="footer-widget">
                    <?php if (!empty($mainFields['footer']['about_us'])): ?>
                        <h6><?= $mainFields['footer']['about_us']['title'] ?? '' ?></h6>
                        <p><?= $mainFields['footer']['about_us']['description'] ?? '' ?></p>
                    <?php endif; ?>
                    <p class="copyright"><?= $mainFields['footer']['copyright'] ?? '' ?></p>
                    <form action="/" class="form-inline">
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Put your email" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Send</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php if (!empty($mainFields['footer']['socials']['list'])): ?>
            <div class="col-lg-2 col-12">
                <div class="footer-widget">
                    <h6><?= $mainFields['footer']['socials']['title'] ?? '' ?></h6>
                    <p><?= $mainFields['footer']['socials']['description'] ?? '' ?></p>
                    <div class="footer-social d-flex align-items-center">
                        <?php foreach ($mainFields['footer']['socials']['list'] as $social): ?>
                            <a href="<?= $social['link'] ?>"><i class="<?= $social['icon'] ?>"></i></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
<?php require VIEW_DIR . '/parts/modals/product.php' ?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"
></script>
<script src="<?= ASSETS_URI ?>/lib/bootstrap/bootstrap.bundle.min.js"></script>
<script src="<?= ASSETS_URI ?>/js/main.js"></script>
</body>
</html>