<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="<?= base_url(); ?>/assets/img/logoatas.png" rel="icon">
    <title>Control Panel | Login</title>
    <link href="<?= base_url(); ?>/assets/css/loginstyles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="my-3 ml-3">

                    <a href="/Home" class="btn btn-primary">Kembali</a>
                </div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>

                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->get('pesan'); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="card-body">
                                    <form action="Auth/login" method="post">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <label class="small mb-1">Username</label>
                                            <input class="form-control py-4" name="username" type="text" placeholder="username">
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1">Password</label>
                                            <input class="form-control py-4" name="password" type="password" placeholder="password">
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary" value="submit">Login</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/assets/js/loginscripts.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
</body>

</html>