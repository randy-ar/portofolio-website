<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fill Social Media</title>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php' ?>
</head>
<body class="bg-dark text-light">
<?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/navbar.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <div class="card text-bg-dark">
        <div class="card-header">
          <h4>Fill Social Media Form</h4>
        </div>
        <form action="/admin/sosmed/store" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="mb-3">
            <label for="Nama" class="form-label">Name</label>
            <input type="text" name="Nama" id="Nama" class="form-control">
          </div>
          <div class="mb-3">
            <label for="Link" class="form-label">Link</label>
            <input type="text" name="Link" id="Link" class="form-control">
          </div>
          <div class="mb-3">
              <label for="Icon" class="form-label">Icon</label>
              <input type="file" name="Icon" id="Icon" class="form-control">
            </div>
          </div>
        </div>
        <div class="card-footer text-end">
          <button type="submit" class="btn btn-primary">Submit <i class="ri-save-line"></i></button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php' ?>
</body>
</html>