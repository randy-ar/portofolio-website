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
      <div class="row justify-content-center">
          <div class="col-10 mt-5">
              <div class="card text-bg-dark">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4>Social Media</h4>

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
                    require_once $_SERVER['DOCUMENT_ROOT'].'/models/sosmed.php';
                    $list_sosmed = sosmed::all();
                    $no = 1;
                    foreach ($list_sosmed as $sosmed) {
                        echo '
                        <tr>
                            <td widtd="1%">'.$no.'</td>
                            <td>'.$sosmed->nama.'</td>
                            <td>'.$sosmed->link.'</td>
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