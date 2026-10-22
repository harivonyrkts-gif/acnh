<!-- Boutons de pages -->
<?php if ($nombre_pages > 1): ?>
    <nav class="pagination">
        <?php if ($page_actuelle > 1): ?>
            <a href="<?= e(lien_page($page_actuelle - 1)) ?>">Précédent</a>
        <?php endif; ?>
        <span><?= $page_actuelle ?> / <?= $nombre_pages ?></span>
        <?php if ($page_actuelle < $nombre_pages): ?>
            <a href="<?= e(lien_page($page_actuelle + 1)) ?>">Suivant</a>
        <?php endif; ?>
    </nav>
<?php endif; ?>
