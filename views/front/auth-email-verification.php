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
        <div class="row">
            <div class="col-md-4">
                <form action="">

                    <!-- pour confirmer la création du compte -->
                    <div class="mb-3 image-round">
                        <!-- <img class="" src="../img/ni-paper-plane.svg" alt=""> -->
                    </div>
                    <div class="mb-3">
                        <p>Verify your email</p>
                    </div>

                    <div class="mb-3">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi, sapiente recusandae nemo ea accusamus tempora sequi porro ipsam. Ea, necessitatibus exercitationem fugiat saepe dignissimos blanditiis a. Minus aspernatur ab atque.</p>
                    </div>

                    <div class="mb-3">
                        <a href="auth-login.html" class="btn btn-primary">Verify email</a>
                    </div>

                    <div class="mb-3">
                        <p>Vous n'avez pas reçu l'email ? <a href="#">renvoyer ?</a> </p>
                    </div>
                    
                </form>

            </div>

            <!-- à cacher dans les mobile -->
            <div class="col-md-7 loginImage">
                <!-- <img src="../img/unlock.svg" alt=""> -->
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>