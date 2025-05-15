 <?php include __DIR__.'/header.php';  ?>

 <div class="main-content">
     <section class="section">
         <div class="section-body">
             <div class="card">
                 <div class="card-header">
                     <h4>Create  Blog</h4>
                 </div>
                 <div class="card-body">
                     <form id="blogForm" enctype="multipart/form-data">
                         <div class="form-group row">
                             <div class="col-sm-6">
                                 <label>Title</label>
                                 <input type="text" name="title" class="form-control" placeholder="Blog Title" required>
                             </div>
                             <div class="col-sm-6">
                                 <label>Slug</label>
                                 <input type="text" name="slug" class="form-control" placeholder="URL Slug" required>
                             </div>
                         </div>

                         <div class="form-group row">
                             <div class="col-sm-6">
                                 <label>Author</label>
                                 <input type="text" name="author" class="form-control" placeholder="Author Name">
                             </div>
                             <div class="col-sm-6">
                                 <label>Category</label>
                                 <input type="text" name="category" class="form-control" placeholder="Category">
                             </div>
                         </div>

                         <div class="form-group row">
                             <div class="col-sm-6">
                                 <label>Image</label>
                                 <input type="file" name="image" class="form-control-file">
                             </div>
                             <div class="col-sm-6">
                                 <label>Created At</label>
                                 <input type="datetime-local" name="created_at" class="form-control">
                             </div>
                         </div>

                         <div class="form-group row">
                             <div class="col-sm-6">
                                 <label>Meta Title</label>
                                 <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                             </div>
                             <div class="col-sm-6">
                                 <label>Meta Keywords</label>
                                 <input type="text" name="meta_keywords" class="form-control"
                                     placeholder="Meta Keywords">
                             </div>
                         </div>

                         <div class="form-group row">
                             <div class="col-sm-12">
                                 <label>Meta Description</label>
                                 <textarea name="meta_description" class="form-control" rows="2"
                                     placeholder="Meta Description"></textarea>
                             </div>
                         </div>

                         <div class="form-group row">
                             <div class="col-sm-12">
                                 <label>Short Content</label>
                                 <textarea name="short_content" class="form-control" rows="2"
                                     placeholder="Short Description"></textarea>
                             </div>
                         </div>

                         <div class="form-group row">
                             <div class="col-sm-12">
                                 <label>Main Content</label>
                                 <textarea name="content" class="form-control" rows="5"
                                     placeholder="Full Blog Content"></textarea>
                             </div>
                         </div>
                     </form>

                 </div>
                 <div class="card-footer text-right">
                    <button type="button" class="btn btn-primary" onclick="submitBlogForm()">Save Blog</button>
                 </div>
             </div>

         </div>
     </section>

 </div>
 <?php include __DIR__.'/footer.php'; ?>