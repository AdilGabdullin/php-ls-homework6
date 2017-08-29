<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Домашнее задание №6. Задание #4</title>
</head>
<body>
<?php
require_once 'vendor/autoload.php';
use Intervention\Image\ImageManager;

$fileName = 'img/php.png';
$newFileName = 'img/new.png';
$watermarkName = 'img/smiling_face.png';
$manager = new ImageManager();
$image = $manager->make($fileName)->rotate(45);
$image->resize(200, null, function ($constraint) {
    $constraint->aspectRatio();
});
$watermark = $manager->make($watermarkName);
$watermark->resize(120, 120)->opacity(40);
$image->insert($watermark, 'center')->save($newFileName);
echo "<img src=\"$newFileName\" alt=\"php\">";
?>
</body>
</html>
