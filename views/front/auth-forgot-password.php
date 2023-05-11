<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="../img/logo.png" alt="logo" width="40"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
              <a class="nav-link" href="#">Features</a>
              <a class="nav-link" href="#">Pricing</a>
              <a class="nav-link disabled">Disabled</a>
            </div>
          </div>
        </div>
    </nav>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Image de fond -->
                    <div class="col-lg-6 d-lg-block bg-login-image"></div>

                    <!-- Formulaire d'inscription -->
                    <div class="col-lg-6">
                        <div class="p-45">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Vous avez oublié votre mot de passe ?</h1>
                                <p class="mb-4">
                                    Nous comprenons que des choses se produisent. Saisissez votre adresse électronique ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe !
                                </p>
                            </div>
                            <form action="" class="user">
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-user" id="email" placeholder="Adresse E-mail">
                                </div>

                                <!-- register button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary">réinitialiser le mot de passe</button>
                                </div>

                                <hr>
                                
                                <div class="text-center">
                                    <a href="auth-register.html" class="small">Créer un compte!</a>
                                </div>
                                
                                <div class="text-center">
                                    <a href="auth-login.html" class="small">Déjà un compte ? Se connecter</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>