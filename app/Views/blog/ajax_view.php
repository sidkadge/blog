<article>
    <h1><?= esc($blog['title']) ?></h1>
    <img src="<?= base_url('public/uploads/' . $blog['image']) ?>" alt="Blog Image">

    <p><strong>Author:</strong> <?= esc($blog['author']) ?></p>
    <p><strong>Category:</strong> <?= esc($blog['category']) ?></p>
    <p><strong>Published on:</strong> <?= date('F j, Y', strtotime($blog['created_at'])) ?></p>

    <div><?= $blog['content'] ?></div>

    <div class="social-share">
         <a href="https://twitter.com/share?url=<?= current_url() ?>" target="_blank" class="social-icon twitter-icon" aria-label="Share on Twitter">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?= current_url() ?>" target="_blank" class="social-icon facebook-icon" aria-label="Share on Facebook">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= current_url() ?>" target="_blank" class="social-icon linkedin-icon" aria-label="Share on LinkedIn">
            <i class="fab fa-linkedin-in"></i>
        </a>
    </div>
</article>

<aside>
    <h2>Other Blogs</h2>
    <ul>
        <?php foreach ($other_blogs as $other): ?>
            <li>
                <a href="<?= site_url('blog/' . $other['slug']) ?>" class="blog-link" data-slug="<?= esc($other['slug']) ?>">
                    <?= esc($other['title']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</aside>
