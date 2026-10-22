<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($titre_page) ?> · Animal Crossing</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="topbar">
    <a class="site-name" href="?view=home">ACNH <span>Catalogue</span></a>
    <nav>
        <?php foreach ($pages as $cle => $p): ?>
            <a href="?view=<?= $cle ?>" <?php if ($vue == $cle) echo 'class="actif"'; ?>>
                <?php if ($p['icone'] != ''): ?>
                    <img class="nav-icon" src="<?= $p['icone'] ?>" alt="">
                <?php endif; ?>
                <?= e($p['titre']) ?>
            </a>
        <?php endforeach; ?>
    </nav>
</header>

<main class="page">
