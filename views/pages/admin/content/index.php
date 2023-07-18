<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$content = dbSelect(Tables::Content);
?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-10 text-center">
                <h3>Content blocks</h3>

                <table>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($content as $key => $item): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['name'] ?></td>
                            <td>
                                <a href="/admin/content/edit/<?= $item['id'] ?>" class="btn btn-info"><i class="fa-solid fa-pen"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';
