<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit portofolio</title>
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php' ?>
</head>
<body class="bg-dark text-light">
<?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/navbar.php' ?>

<?php 
  require_once $_SERVER['DOCUMENT_ROOT'].'/models/porto_folio.php';
  $id = $_GET['id'];
  $porto_folio = porto_folio::find($id);
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-10 mt-5">
      <div class="card text-bg-dark">
        <div class="card-header">
          <h4>Edit porto_folio</h4>
        </div>
        <form action="/admin/porto_folio/update?id=<?php echo $porto_folio->id ?>" method="post" enctype="multipart/form-data">
        <div class="card-body">
          <div class="mb-3 text-center">
            <img style="width: 100px;" src="<?php echo $porto_folio->getImage() ?>" alt="<?php echo $porto_folio->judul ?>" class="mb-3">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Judul</label>
            <input type="text" value="<?php echo $porto_folio->judul ?>" name="judul" id="judul" class="form-control">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Deskripsi</label>
            <input type="text" value="<?php echo $porto_folio->deskripsi ?>" name="deskripsi" id="deskripsi" class="form-control">
          </div>
          
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
          </div>
          <div class="mb-3">
            <label for="name" class="form-label">Link</label>
            <input type="text" value="<?php echo $porto_folio->link ?>" name="link" id="link" class="form-control">
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