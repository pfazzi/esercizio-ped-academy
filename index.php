<?php require_once 'bootstrap.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Demo</title>
</head>

<body>
    <p>Hello, world!</p>

    <ul>
    <?php foreach ($repo->getAll() as $post): ?>
        <li><?= $post->title ?>
            <a href="remove-post.php?title=<?php echo urlencode($post->title);?>">elimina</a>
        </li>
    <?php endforeach; ?>
    </ul>

    <form method="post" action="save-post.php">
        <input type="text" name="title">
        <input type="submit">
    </form>
</body>
</html>
