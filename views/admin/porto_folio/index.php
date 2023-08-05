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
                            <h4>Portofolio</h4>
                        </div>
                        <div class="col-6 text-md-end">
                            <a href="/admin/porto_folio/create" class="btn btn-outline-light">Create <i class="ri-add-fill"></i></a>
                        </div>
                    </div>
                </div>
              <div class="row mt-4 justify-content-center">   
        <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/models/porto_folio.php';
            $list_porto_folio = porto_folio::all();
            $no = 1;
            foreach ($list_porto_folio as $porto_folio) {
                echo '
                <div class="col-md-4 mt-3 ">
                <div class="card" style="width: 18rem;">
                    <img src="'.$porto_folio->getImage().'" class="card-img-top" alt="...">
                    <div class="card-body bg-dark">
                        <h5 class="card-title"><a href="'.$porto_folio->link.'">'.$porto_folio->judul.'</a></h5>
                        <p class="card-text">'.$porto_folio->deskripsi.'</p>
                        <a href="/admin/porto_folio/edit?id='.$porto_folio->id.'" class="btn btn-outline-success">Edit <i class="ri-edit-box-line"></i></a>
                        <a href="/admin/porto_folio/delete?id='.$porto_folio->id.'" class="btn btn-outline-danger" onclick="return confirm(`Hapus data ini? data yang telah dihapus tidak dapat dikembalikan.`);">Delete <i class="ri-delete-bin-2-line"></i></a>
                    </div>
                </div>
                </div>         
                ';
                $no ++;
            }
                ?>
        </div>   
    </div>
                </div>
              </div>
          </div>
      </div>
      
</div>                 
  
  <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/footer.php' ?>
</body>
</html>