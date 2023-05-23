<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php



?>

    <div class="div">
        <h1 class="title"> <?= $post->getTitle() ?> <h1>

        <div class="author"> <?= $post->getTitle() ?> </div>
        <div class="date"><?= $post->getTitle() ?> </div>
    </div>
    <div>
        <img src="<?= $post->getImage() ?> " alt="Titre article">
    </div>

    <div class="content">
        <?= $post->getContent() ?> 
    </div>

    <br><br>


    <div class="comments">
        <!-- formulaire des commentaires -->
        <form action="" method>
            <input type="text" name="comment" placeholder>
            <button type="submit">Commenter</button>
        </form>

        <br>

        <!-- liste des commentaires -->
        <div>
            <div>
                <img src="image de l'utilisateur" alt="">
            </div>

            <div>
                <div>Nom Prenom</div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis autem quas in deleniti, cum incidunt dolores esse repellat nobis distinctio sequi asperiores quia dolore doloremque aliquid. Possimus optio dolore aliquam.</p>
                <?= debug($comments); ?>
            </div>
        </div>
    </div>
    
    
</body>
</html>