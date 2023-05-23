<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="categoryName" placeholder="Nom de la catégorie"><br>
        <input type="text" name="categorySlug" placeholder="Slug"><br>

        Catégorie parent : 
        <select name="categoryParent" id="">

        <?php foreach( $categories as $category ): ?>
            <option value="<?= $category->getSlug(); ?>"><?= $category->getName(); ?></option>
        <?php endforeach; ?>

        </select> <br>
        
        <textarea name="categoryDescription" id="" cols="30" rows="10" placeholder="Description de la catégorie"></textarea><br>
        <!-- Liste des parents -->


        
        <button type="submit">Enregistrer la catégorie</button>
    </form>
</body>
</html>