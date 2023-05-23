<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog</title>
</head>
<body>
  <div class="blog">    
    
    <?php foreach( $allPosts as $post ): ?>
      <div class="article">
        <div class="category"><?= $post->getCategoryId(); ?></div>
        <img src="<?= $post->getImage(); ?>" alt="Image">
        <h3><?= $post->getTitle(); ?></h3>
        <div class="postDate"><?= $post->getCreationDate(); ?></div>
        <p><?= $trimmedText->displayFirst150Characters( $post->getContent() ); ?></p>
        <a href="?action=post&id=<?= $post->getId(); ?>">Lire la suite</a>
      </div>
    <?php endforeach; ?>

  </div>
</body>
</html>