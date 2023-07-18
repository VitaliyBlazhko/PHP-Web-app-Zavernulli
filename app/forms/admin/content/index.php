<?php

function blockEditTitle(string $name)
{
    ?>
    <div class="card-header">
        <h3>Edit "<?= ucfirst($name) ?>" block</h3>
    </div>
    <?php
}

function updateContent()
{
    $fields = $_POST;

    $name = $fields['content_name'];
    $id = $fields['content_id'];
    unset($fields['content_name']);
    unset($fields['content_id']);

    match ($name) {
        'navigation' => updateNavigationContent($fields, $id),
        default => redirect("/admin/content/edit/{$id}")
    };
}

function updateNavigationContent(array $fields, int $id)
{
    $item = dbFind(Tables::Content, $id);
    $content = json_decode($item['content'], true);
    $content = [
        'logo' => uploadSiteLogo($content['logo']),
        'links' => array_values($fields['links']),
    ];
    $preparedFields = json_encode($content);

    $query = "UPDATE " . Tables::Content->value . " SET content = :content WHERE id = :id";
    $query = DB::connect()->prepare($query);

    $query->bindParam('content', $preparedFields);
    $query->bindParam('id', $id, PDO::PARAM_INT);

    if (!$query->execute()) {
        notify('Oops smth wrong');
    } else {
        notify('Block was successfully updated');
    }

    redirect("/admin/content/edit/{$id}");
}

function uploadSiteLogo(string $oldLogo)
{
    if (!empty($_FILES)) {
        $logo = $_FILES['logo'];
        $name = time() . "_{$logo['name']}";
        $path = IMAGES_DIR . $name;

        if (!move_uploaded_file($logo['tmp_name'], $path)) {
            notify('We can not upload this file','danger');
            redirect("/admin/content/edit/{$_POST['content_id']}");
        }

        $oldFile = IMAGES_DIR . str_replace('/', '', $oldLogo);
        if (file_exists($oldFile)) {
            unlink($oldFile);
        }

        return "/{$name}";
    }

    return $oldLogo;
}
