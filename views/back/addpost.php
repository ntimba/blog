<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data" >
        <input type="text" name="postTitle" placeholder="Titre de l'article"><br>
        <input type="text" name="postSlug" placeholder="Slug"><br>

        <input type="file" name="featuredImage" > <br>

        Catégorie : 
        <select name="categoryName" id="">
            <?php foreach( $categories as $category ): ?>
            <option value="<?= $category->getSlug(); ?>"><?= $category->getName(); ?></option>
            <?php endforeach; ?>
        </select> <br>

        <a href="index.php?action=createcategory">Créer une catégorie</a> <br>

        <textarea name="postContent" id="" cols="30" rows="10" placeholder="Contenu de l'article"></textarea><br>
        <!-- Liste des parents -->

        <button type="submit">Enregistrer la catégorie</button>
    </form>
</body>
</html>