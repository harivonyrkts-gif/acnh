<!-- ===== PAGE D'UNE CATÉGORIE ===== -->
<section class="catalog-heading">
    <div>
        <h1><?= e($titre_page) ?></h1>
        <p>Résultats : <strong><?= number_format($total, 0, ',', ' ') ?></strong></p>
    </div>
    <?php if ($total > 0): ?>
        <span class="page-count">Page <?= $page_actuelle ?> sur <?= $nombre_pages ?></span>
    <?php endif; ?>
</section>

<?php require 'views/filters.php'; ?>

<?php require 'views/results.php'; ?>
