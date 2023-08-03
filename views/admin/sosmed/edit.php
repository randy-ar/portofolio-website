<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Sosial Media</title>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php' ?>
</head>
<body class="bg-dark text-light">
<?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/navbar.php' ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <div class="card text-bg-dark">
        <div class="card-header">
          <h4>Edit Sosial Media</h4>
        </div>
        <form action="/admin/sosmed/update?id=<?php echo $sosmed->id ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="mb-3 text-center">
            <img style="width: 100px;" src="<?php echo $sosmed->getImage() ?>" alt="<?php echo $sosmed->nama ?>" class="mb-3">
          </div>
          <div class="mb-3">
            <label for="Nama" class="form-label">Name</label>
            <input type="text" value="<?php echo $sosmed->nama ?>" name="Nama" id="Nama" class="form-control">
          </div>
          <div class="mb-3">
            <label for="Link" class="form-label">Link</label>
            <input type="text" value="<?php echo $sosmed->link ?>" name="Link" id="Link" class="form-control">
          </div>
          <div class="mb-3">
            <label for="Icon" class="form-label">Icon</label>
            <input type="file" name="Icon" id="Icon" class="form-control">
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