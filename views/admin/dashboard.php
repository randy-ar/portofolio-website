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
                    <div class="col-6 mb-3">
                        <div class="card text-light bg-dark">
                            <div class="card-body">
                                <h1>Banner</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card text-light bg-dark">
                            <div class="card-body">
                                <h1>Social Media</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card text-light bg-dark">
                            <div class="card-body">
                                <h1>Skills</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card text-light bg-dark">
                            <div class="card-body">
                                <h1>Portofolio</h1>
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