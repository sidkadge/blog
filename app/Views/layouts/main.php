<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'My Blog') ?></title>
    <meta name="keywords" content="<?= esc($meta_keywords ?? '') ?>">
    <meta name="description" content="<?= esc($meta_description ?? '') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/style.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>My Blog</h1>
        <a href="<?= base_url('login') ?>" class="login-link">Login</a>
    </header>
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    <footer>
        <p>&copy; <?= date('Y') ?> My Blog. All rights reserved.</p>
    </footer>
</body>
</html>