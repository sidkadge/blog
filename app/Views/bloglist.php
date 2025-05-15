<?php include __DIR__ . '/header.php'; ?>

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Blog List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="blogTable">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($blogs as $blog): ?>
                            <tr id="blog-<?= $blog['id'] ?>">
                                <td><?= esc($blog['title']) ?></td>
                                <td><?= esc($blog['author']) ?></td>
                                <td><?= esc($blog['category']) ?></td>
                                <td><?= esc($blog['created_at']) ?></td>
                                <td>
                                    <img src="<?= base_url('public/uploads/' . $blog['image']) ?>" width="70">
                                </td>
                                <td>
                                    <a href="#" class="btn btn-icon btn-primary editBtn" data-id="<?= $blog['id'] ?>"
                                        data-title="<?= esc($blog['title']) ?>" data-slug="<?= esc($blog['slug']) ?>"
                                        data-short_content="<?= esc($blog['short_content']) ?>"
                                        data-content="<?= esc($blog['content']) ?>"
                                        data-author="<?= esc($blog['author']) ?>"
                                        data-category="<?= esc($blog['category']) ?>"
                                        data-meta_title="<?= esc($blog['meta_title']) ?>"
                                        data-meta_keywords="<?= esc($blog['meta_keywords']) ?>"
                                        data-meta_description="<?= esc($blog['meta_description']) ?>"
                                        data-created_at="<?= esc($blog['created_at']) ?>" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>

                                    <a href="#" class="btn btn-icon btn-danger deleteBtn" data-id="<?= $blog['id'] ?>"
                                        title="Delete">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </td>

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="editForm" enctype="multipart/form-data">
            <input type="hidden" name="id" id="editId">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Blog</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Input fields -->
                    <input type="text" class="form-control mb-2" name="title" id="editTitle" placeholder="Title"
                        required>
                    <input type="text" class="form-control mb-2" name="slug" id="editSlug" placeholder="Slug" required>
                    <input type="text" class="form-control mb-2" name="short_content" id="editShortContent"
                        placeholder="Short Content">
                    <textarea class="form-control mb-2" name="content" id="editContent"
                        placeholder="Content"></textarea>
                    <input type="text" class="form-control mb-2" name="author" id="editAuthor" placeholder="Author">
                    <input type="text" class="form-control mb-2" name="category" id="editCategory"
                        placeholder="Category">
                    <input type="text" class="form-control mb-2" name="meta_title" id="editMetaTitle"
                        placeholder="Meta Title">
                    <input type="text" class="form-control mb-2" name="meta_keywords" id="editMetaKeywords"
                        placeholder="Meta Keywords">
                    <textarea class="form-control mb-2" name="meta_description" id="editMetaDescription"
                        placeholder="Meta Description"></textarea>
                    <input type="datetime-local" class="form-control mb-2" name="created_at" id="editCreatedAt">
                    <input type="file" class="form-control mb-2" name="image">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include __DIR__ . '/footer.php'; ?>