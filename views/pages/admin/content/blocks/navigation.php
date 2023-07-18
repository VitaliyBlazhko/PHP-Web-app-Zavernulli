<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$fields = [];
if (!empty($_SESSION['edit_content']['fields'])) {
    $fields = $_SESSION['edit_content']['fields'];
    unset($_SESSION['edit_content']['fields']);
}
$content = json_decode($block['content'], true);
$links = $content['links'] ?? [];
//dd($content);
?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="card">
                    <?php blockEditTitle($block['name']) ?>
                    <div class="card-body">
                        <form action="/" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="edit_content"/>
                            <input type="hidden" name="content_id" value="<?= $block['id'] ?>"/>
                            <input type="hidden" name="content_name" value="<?= $block['name'] ?>"/>


                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" name="logo" />
                            </div>

                            <h5>Links</h5>
                            <?php $lastKey = array_key_last($links) ?>
                            <div class="mb-3 links-wrapper" data-last_key="<?= $lastKey ?>">
                                <?php foreach ($links as $key => $link): ?>
                                    <div class="input-group mb-3 links-item" data-key="<?= $key ?>">
                                        <input type="text" aria-label="href"
                                               name="links[<?= $key ?>][href]"
                                               value="<?= $link['href'] ?>"
                                               class="form-control"
                                        >
                                        <input type="text" aria-label="href"
                                               name="links[<?= $key ?>][text]"
                                               value="<?= $link['text'] ?>"
                                               class="form-control"
                                        >
                                        <button class="btn btn-outline-danger remove-link"
                                                type="button"
                                                id="button-addon2"
                                                data-key="<?= $key ?>"
                                        ><i class="fa-solid fa-xmark"></i></button>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="mb-3 d-flex justify-content-end">
                                <button type="button" class="btn btn-outline-success add-link">Add link</button>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if (!empty($_SESSION['edit_content']['errors'])) {
    unset($_SESSION['edit_content']['errors']);
}
require_once ADMIN_PARTS_DIR . '/footer.php';
