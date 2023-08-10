<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banner</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php' ?>
</head>
<body class="bg-dark text-light">
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/navbar.php' ?>
  <?php
    if(isset($_SESSION['failed'])){
      echo '
      <div class="row justify-content-center mt-5">
          <div class="col-8">
              <div class="alert alert-danger" role="alert">
                  '.$_SESSION['failed'].'
              </div>
          </div>
      </div>
      ';
      session_unset();
  }
  ?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 mt-5">
        <div class="card bg-dark text-light">
          <div class="card-header">
            <h4>Banner</h4>
          </div>
          <form action="/admin/banner/store" method="post">
          <div class="card-body">
            <div class="mb-3">
              <label for="tagline" class="form-label">Tagline</label>
              <input type="text" value="<?php echo $banner->tagline ?>" name="tagline" id="tagline" class="form-control">
            </div>
            <div class="mb-3">
              <div class="row align-items-end">
                <div class="col-10">
                <label class="form-label">Judul</label>
                <input type="text" name="list_judul[]" class="form-control mb-3">
                <div id="after" class="hidden"></div>
                </div>
                <div class="col-2 text-center">
                  <div class="mb-3">
                    <button type="button" id="add" class="btn btn-outline-light"><i class="ri-add-line"></i></button>
                    <button type="button" id="del" class="btn btn-outline-danger"><i class="ri-subtract-line"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label for="paragraf" class="form-label">Paragraf</label>
              <textarea name="paragraf" id="paragraf" class="form-control"><?php echo $banner->paragraf ?></textarea>
            </div>
          </div>
          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Simpan <i class="ri-save-line"></i></button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php' ?>

  <script>
    var list_judul = "<?php echo $banner->judul ?>".split("||");
    list_judul.pop()

    console.log(list_judul);
    $(() => {
      if(list_judul.length > 0){
        $('#after').prev('input.form-control').remove().end();
        list_judul.forEach(judul => {
          $('#after').before(`
            <input type="text" value="${judul}" name="list_judul[]" class="form-control mb-3">
          `);
        });
      }
      $('#add').on('click', ()=>{
        $('#after').before(`
          <input type="text" name="list_judul[]" class="form-control mb-3">
        `);
      });
      $('#del').on('click', ()=>{
        $('#after').prev('input.form-control').remove().end();
      });
    });
  </script>
</body>
</html>