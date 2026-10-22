<!-- Liste des résultats -->
<?php if (count($elements) == 0): ?>
    <p class="empty-message">Aucun résultat pour cette recherche.</p>
<?php else: ?>
    <section class="item-grid">
        <?php foreach ($elements as $element): ?>
            <?php require 'views/card.php'; ?>
        <?php endforeach; ?>
    </section>

    <?php require 'views/pagination.php'; ?>
<?php endif; ?>
