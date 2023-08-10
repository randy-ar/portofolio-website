<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Features</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php' ?>
</head>
<body class="bg-dark text-light">
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/navbar.php' ?>

  <div class="container">
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
      <div class="row justify-content-center">
          <div class="col-10 mt-5">
            <div class="card text-light bg-dark mb-3">
                <div class="card-header">
                    <h4>Contact</h4>
                </div>
                <form action="/admin/app-setting/store" method="post">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nomor_whatsapp" class="form-label">Nomor Whatsapp</label>
                        <input value="<?php echo $app_setting->nomor_whatsapp ?>" type="text" name="nomor_whatsapp" id="nomor_whatsapp" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Simpan <i class="ri-save-line"></i></button>
                </div>
                </form>
            </div>
              <div class="card text-bg-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Social Media</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="/admin/sosmed/create" class="btn btn-outline-light">Create <i class="ri-add-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-responsive table-stripped table-dark table-hover w-100" style="white-space: nowrap;">
                <tr>
                    <th width="1%">No</th>
                    <th>Platform</th>            
                    <th>Link</th>
                    <th>Action</th>
                </tr>
                <?php
                    $no = 1;
                    foreach ($list_sosmed as $sosmed) {
                        echo '
                        <tr>
                            <td widtd="1%">'.$no.'</td>
                            <td><img src="'.$sosmed->getImage().'" style="height: 30px;"> '.$sosmed->nama.'</td>
                            <td><a target="__blank" href="'.$sosmed->link.'">'.$sosmed->link.'</a></td>
                            <td class="text-center">
                                <a href="/admin/sosmed/edit?id='.$sosmed->id.'" class="btn btn-outline-success">Edit <i class="ri-edit-box-line"></i></a>
                                <a href="/admin/sosmed/delete?id='.$sosmed->id.'" class="btn btn-outline-danger" onclick="return confirm(`Hapus data ini? data yang telah dihapus tidak dapat dikembalikan.`);">Delete <i class="ri-delete-bin-2-line"></i></a>
                            </td>
                        </tr>
                        ';
                        $no ++;
                    }
                ?>
              </table>
                </div>
              </div>
          </div>
      </div>
  </div>
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php' ?>
</body>
</html>