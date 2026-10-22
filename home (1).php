<section class="welcome">
    <h1>Animal Crossing: New Horizons</h1>
    <p>Recherche un habitant, un meuble ou une créature.</p>
</section>

<section class="catalog-grid">
    <?php foreach ($pages as $cle => $p): ?>
        <a class="catalog-tile" href="?view=<?= $cle ?>">
            <span class="tile-title">
                <?php if ($p['icone'] != ''): ?>
                    <img class="catalog-icon" src="<?= $p['icone'] ?>" alt="">
                <?php endif; ?>
                <?= e($p['titre']) ?>
            </span>
            <span class="tile-count">
                <strong><?= number_format($compteurs[$cle], 0, ',', ' ') ?></strong>
                <span>éléments</span>
            </span>
        </a>
    <?php endforeach; ?>
</section>
