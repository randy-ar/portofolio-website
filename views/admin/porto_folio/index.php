<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PortoFolio</title>
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
                            <h4>Portifolio</h4>
                        </div>
                        <div class="col-6 text-md-end">
                            <a href="/admin/porto_folio/create" class="btn btn-outline-light">Create <i class="ri-add-fill"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered table-responsive table-stripped table-dark table-hover w-100" style="white-space: nowrap;">
                <tr>
                    <th width="1%">No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>image</th>
                    <th>link</th>
                </tr>
                <?php
                    require_once $_SERVER['DOCUMENT_ROOT'].'/models/porto_folio.php';
                    $list_porto_folio = porto_folio::all();
                    $no = 1;
                    foreach ($list_porto_folio as $porto_folio) {
                        echo '
                        <tr>
                            <td widtd="1%">'.$no.'</td>
                            <td>'.$porto_folio->judul.'</td>
                            <td>'.$porto_folio->deskripsi.'</td>
                            <td><img src="'.$porto_folio->getImage().'" style="width: 100px;"></td>
                            <td>'.$porto_folio->link.'</td>
                            <td class="text-center">
                                <a href="/admin/porto_folio/edit?id='.$porto_folio->id.'" class="btn btn-outline-success">Edit <i class="ri-edit-box-line"></i></a>
                                <a href="/admin/porto_folio/delete?id='.$porto_folio->id.'" class="btn btn-outline-danger" onclick="return confirm(`Hapus data ini? data yang telah dihapus tidak dapat dikembalikan.`);">Delete <i class="ri-delete-bin-2-line"></i></a>
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