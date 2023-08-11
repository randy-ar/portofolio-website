<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/head.php' ?>
</head>
<body class="bg-dark text-light">
    <?php include $_SERVER['DOCUMENT_ROOT'].'/views/layouts/navbar.php' ?>
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-10">
                <div class="row">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card ">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-light">Banner</h5>
                            <p class="card-text text-light">Setting apa yang ingin anda tampilkan di halaman Banner.</p>
                            <a href="/admin/banner" class="btn btn-primary">Masuk</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-light">Social Media</h5>
                            <p class="card-text text-light">Setting apa yang ingin anda tampilkan di halaman Social Media.</p>
                            <a href="/admin/sosmed" class="btn btn-primary">Masuk</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-3">
                        <div class="card">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-light">Skills</h5>
                            <p class="card-text text-light">Setting apa yang ingin anda tampilkan di halaman Skills.</p>
                            <a href="/admin/skills" class="btn btn-primary">Masuk</a>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mt-3" >
                        <div class="card">
                        <div class="card-body bg-dark">
                            <h5 class="card-title text-light">Portofolio</h5>
                            <p class="card-text text-light">Setting apa yang ingin anda tampilkan di halaman Portofolio.</p>
                            <a href="/admin/porto_folio" class="btn btn-primary">Masuk</a>
                        </div>
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