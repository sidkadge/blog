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

</script>
  <script src="<?=base_url(); ?>public/assets/js/app.min.js"></script>
  <script src="<?=base_url(); ?>public/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url(); ?>public/assets/js/page/index.js"></script>
  <script src="<?=base_url(); ?>public/assets/js/scripts.js"></script>
  <script src="<?=base_url(); ?>public/assets/js/custom.js"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>