<?php ob_start(); ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Image de fond -->
                    <div class="col-lg-5 d-lg-block bg-login-image"></div>

                    <!-- Formulaire d'inscription -->
                    <div class="col-lg-7">
                        <div class="p-45">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créer un compte</h1>
                            </div>
                            <form action="" class="user" method="post">
                                <div class="form-group row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="firstname" placeholder="Prénom">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" name="lastname" placeholder="Nom">
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Adresse E-mail">
                                </div>

                                <div class="form-group row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user" name="repeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                            

                                <!-- register button -->
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary">S'enregistrer</button>
                                </div>

                                <hr>
                                <div class="text-center">
                                    <!-- <a href="auth-forgot-password.html" class="small">Mot de passe oublié ?</a> -->
                                </div>

                                <div class="text-center">
                                    <a href="index.php?action=login" class="small">J'ai déjà un compte!</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('views/layout.php'); ?>