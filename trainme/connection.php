<?php

// Database connection. Uses SQLite out of the box (zero setup).
// To use MySQL instead, set the DB_DSN, DB_USER and DB_PASS environment
// variables, e.g. DB_DSN="mysql:host=localhost;dbname=trainme;charset=utf8mb4"

$dataDir = __DIR__ . "/data";

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0775, true);
}

try {

    if (getenv("DB_DSN")) {
        $link = new PDO(getenv("DB_DSN"), getenv("DB_USER") ?: null, getenv("DB_PASS") ?: null);
    } else {
        $link = new PDO("sqlite:" . $dataDir . "/trainme.db");
    }

    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    if ($link->getAttribute(PDO::ATTR_DRIVER_NAME) === "sqlite") {
        $link->exec("CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL
        )");
    } else {
        $link->exec("CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL
        )");
    }

} catch (PDOException $e) {

    die("Something went wrong, please try again later");
}

// Secret used to sign the "stay logged in" cookie so it can't be forged.
function appSecret() {

    static $secret = null;

    if ($secret === null) {

        $secretFile = __DIR__ . "/data/secret.txt";

        if (!file_exists($secretFile)) {
            file_put_contents($secretFile, bin2hex(random_bytes(32)));
        }

        $secret = trim(file_get_contents($secretFile));
    }

    return $secret;
}

function signUserId($id) {

    return $id . "|" . hash_hmac("sha256", (string)$id, appSecret());
}

function userIdFromCookie() {

    if (empty($_COOKIE['id'])) {
        return null;
    }

    $parts = explode("|", $_COOKIE['id'], 2);

    if (count($parts) !== 2) {
        return null;
    }

    if (!hash_equals(hash_hmac("sha256", $parts[0], appSecret()), $parts[1])) {
        return null;
    }

    return (int)$parts[0];
}

?>
