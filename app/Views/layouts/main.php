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
</head>
<body>
    <header>
        <h1>My Blog</h1>
        <a href="<?= base_url('login') ?>" class="login-link">Login</a>
    </header>

    <main id="main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> My Blog. All rights reserved.</p>
    </footer>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const mainContent = document.getElementById('main-content');

        function loadBlog(slug) {
            fetch('<?= base_url('blog/ajaxView/') ?>' + slug)
                .then(response => {
                    if (!response.ok) throw new Error('Failed to load');
                    return response.text();
                })
                .then(html => {
                    mainContent.innerHTML = html;
                    history.pushState(null, '', '<?= base_url('blog/') ?>' + slug);
                })
                .catch(() => {
                    mainContent.innerHTML = '<p>Could not load blog content.</p>';
                });
        }

        document.body.addEventListener('click', function (e) {
            const link = e.target.closest('.blog-link');
            if (link && link.dataset.slug) {
                e.preventDefault();
                loadBlog(link.dataset.slug);
            }
        });

        window.addEventListener('popstate', function () {
            location.reload(); // Optional: Handle back/forward nav
        });
    });
    </script>
</body>
</html>
