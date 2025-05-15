 <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Templateshub</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
 
  <script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.editBtn').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            document.getElementById('editId').value = id;
            document.getElementById('editTitle').value = this.dataset.title;
            document.getElementById('editSlug').value = this.dataset.slug;
            document.getElementById('editShortContent').value = this.dataset.short_content;
            document.getElementById('editContent').value = this.dataset.content;
            document.getElementById('editAuthor').value = this.dataset.author;
            document.getElementById('editCategory').value = this.dataset.category;
            document.getElementById('editMetaTitle').value = this.dataset.meta_title;
            document.getElementById('editMetaKeywords').value = this.dataset.meta_keywords;
            document.getElementById('editMetaDescription').value = this.dataset
            .meta_description;
            document.getElementById('editCreatedAt').value = this.dataset.created_at.replace(
                ' ', 'T');
            $('#editModal').modal('show');
        });
    });
  document.getElementById('editForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const id = formData.get('id');
    fetch(`<?= base_url('updateblog/') ?>${id}`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Blog updated successfully');
            location.reload();
        } else {
            alert('Update failed');
        }
    });
});
document.querySelectorAll('.deleteBtn').forEach(btn => {
    btn.addEventListener('click', function() {
        const id = this.dataset.id;
        if (confirm('Are you sure to delete?')) {
            fetch(`<?= base_url('deleteblog/') ?>${id}`, {
                method: 'POST'
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById(`blog-${id}`).remove();
                } else {
                    alert('Delete failed');
                }
            });
        }
    });
});
});
</script>
  <script>
function submitBlogForm() {
    const form = document.getElementById('blogForm');
    const formData = new FormData(form);

    // Auto-generate slug if not provided
    if (!formData.get('slug')) {
        const title = formData.get('title');
        const slug = title.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
        formData.set('slug', slug);
    }

    fetch('<?= base_url('addblogs') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            alert('Blog saved successfully!');
            // Clear form fields
            form.reset(); // Reset non-file inputs
            // Manually clear file input
            const fileInput = form.querySelector('input[type="file"]');
            if (fileInput) {
                fileInput.value = ''; // Clear file input
            }
        } else {
            alert('Error: ' + (result.message || 'Something went wrong.'));
        }
    })
    .catch(error => {
        console.error('AJAX Error:', error);
        alert('An error occurred. Please try again.');
    });
}
$(document).ready(function () {
  $('.editBtn').click(function () {
    const data = $(this).data();
    $('#editId').val(data.id);
    $('#editTitle').val(data.title);
    $('#editSlug').val(data.slug);
    $('#editShortContent').val(data.short_content);
    $('#editContent').val(data.content);
    $('#editAuthor').val(data.author);
    $('#editCategory').val(data.category);
    $('#editCreatedAt').val(data.created_at.replace(' ', 'T')); 
    $('#editMetaTitle').val(data.meta_title);
    $('#editMetaKeywords').val(data.meta_keywords);
    $('#editMetaDescription').val(data.meta_description);
    $('#imageNamePreview').text(data.image);
    $('#imagePreview').attr('src', `<?= base_url('public/uploads/') ?>${data.image}`);
    $('#editModal').modal('show');
  });
  $('#editBlogForm').submit(function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    const id = $('#editId').val();
    $.ajax({
      url: "<?= base_url('updateblog') ?>" + id,
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        if (response.status === 'success') {
          alert('Blog updated successfully!');
          $('#editModal').modal('hide');
          location.reload();
        } else {
          alert('Failed to update blog');
        }
      },
      error: function (xhr) {
        alert('Error occurred: ' + xhr.responseText);
      }
    });
  });
  $('.deleteBtn').click(function () {
    if (confirm("Are you sure you want to delete this blog?")) {
      const id = $(this).data('id');
      $.ajax({
        url: "<?= base_url('deleteblog') ?>" + id,
        type: "POST",
        success: function (response) {
          if (response.status === 'success') {
            $('#row-' + id).remove();
          } else {
            alert('Delete failed');
          }
        }
      });
    }
  });
});

</script>

  <script src="<?=base_url(); ?>public/assets/js/app.min.js"></script>
  <script src="<?=base_url(); ?>public/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url(); ?>public/assets/js/page/index.js"></script>
  <script src="<?=base_url(); ?>public/assets/js/scripts.js"></script>
  <script src="<?=base_url(); ?>public/assets/js/custom.js"></script>
  
</body>
</html>