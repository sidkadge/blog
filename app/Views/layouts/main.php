<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'My Blog') ?></title>
    <meta name="keywords" content="<?= esc($meta_keywords ?? '') ?>">
    <meta name="description" content="<?= esc($meta_description ?? '') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
</head>
<body>
    <header>
        <h1>My Blog</h1>
    </header>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <footer>
        <p>&copy; <?= date('Y') ?> My Blog. All rights reserved.</p>
    </footer>
</body>
</html>
