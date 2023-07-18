<?php

function convertContentToAssoc(array $data = []): array
{
    $assoc = [];

    if (!empty($data)) {
        foreach ($data as $row) {
            $assoc[$row['name']] = json_decode($row['content'], true);
        }
    }

    return $assoc;
}

function getRequestType(): string
{
    $type = filter_input(INPUT_POST, 'type');
    unset($_POST['type']);

    return htmlspecialchars($type);
}

function redirect($path = '/')
{
    $url = DOMAIN . $path;
    header("Location: {$url}");
    exit;
}

function notify(string $text, string $class = 'success')
{
    $_SESSION['notify'] = compact('text', 'class');
}

function getUrl(): string
{
    $url = trim($_SERVER['REQUEST_URI'], '/');
    return explode('?', $url)[0];
}

function isCurrentPage(string $path = ''): bool
{
    return $path === getUrl();
}

function emptyFields(array $data, string $key): bool
{
    $result = false;
    $emptyFields = array_keys($data, null, true);

    if (!empty($emptyFields)) {
        foreach ($emptyFields as $fieldName) {
            $_SESSION[$key]['errors'][$fieldName] = "The field '{$fieldName}' is not correct";
        }
        $result = true;
    }

    return $result;
}

function formError(string|null $message = null): string
{
    $html = '';
    $template = "<div class='mb-3'><span class='alert alert-danger'>%s</span></div>";

    if ($message) {
        $html = sprintf($template, $message);
    }

    return $html;
}

function conditionRedirect($condition = false, $path = '/')
{
    if ($condition) {
        redirect($path);
    }
}
