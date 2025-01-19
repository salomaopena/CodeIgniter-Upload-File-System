<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
</head>
<body>
    <?=form_open_multipart('/upload-submit')?>
        <input type="file" name="file_upload">
        <input type="submit" value="Upload">
    <?= form_close() ?>

    <?php if(!empty($validation_errors)): ?>
        <?php foreach ($validation_errors as $error): ?>
        <p style="color: red;"><?=$error?></p>
        <?php endforeach;?>
    <?php endif?>
</div>
</body>
</html>