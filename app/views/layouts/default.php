<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/public/css/main.css">
        <?php if (!empty($meta)): ?>
            <title><?= $meta['title']; ?></title>
            <meta name="description" content="<?= $meta['desc']; ?>">
            <meta name="keywords" content="<?= $meta['keywords']; ?>">
        <?php endif; ?>
    </head>

    <body>

        <div class="container">

            <?php if (!empty($content)): ?>
                <?=$content; ?>
            <?php endif; ?>

        </div>

    <script src="/public/bootstrap/js/jquery-3.4.1.min.js"></script>
    <script src="/public/bootstrap/js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="/public/js/main.js"></script>

    </body>
</html>
