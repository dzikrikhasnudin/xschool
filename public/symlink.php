<?php
$target = __DIR__.'/../xschool/storage/app/public';
$link = __DIR__.'/storage';
symlink($target, $link);

echo 'Symlink berhasil';
