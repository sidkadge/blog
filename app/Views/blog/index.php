<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="blog-grid">
    <?php foreach ($blogs as $blog): ?>
        <div class="blog-card">
            <img src="<?= base_url('public/uploads/' . $blog['image']) ?>">


            <h2><a href="<?= site_url('blog/' . $blog['slug']) ?>"><?= esc($blog['title']) ?></a></h2>
            <p><?= esc($blog['short_content']) ?></p>
            <p><strong>Author:</strong> <?= esc($blog['author']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
<?= $this->endSection() ?>
