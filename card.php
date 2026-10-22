<article class="item-card">
    <div class="item-photo">
        <img src="<?= e(adresse_image($vue, $element['image'])) ?>" alt="" loading="lazy">
    </div>
    <h2><?= e($element['nom']) ?></h2>

    <?php
    // Liste des infos à afficher : [titre, valeur]
    $infos = [];

    if ($est_creature) {
        if ($element['lieu'] != '') {
            $infos[] = ['Lieu', $element['lieu']];
        }
        $infos[] = [($vue == 'insects') ? 'Météo' : 'Ombre', $element['detail']];
        $infos[] = ['Apparitions', $element['apparitions']];
        if ($element['all_day'] == 1) {
            $infos[] = ['Horaire', 'Toute la journée'];
        } else {
            $infos[] = ['Horaire', sprintf('%02dh', $element['hour_start']) . ' – ' . sprintf('%02dh', $element['hour_end'])];
        }

    } elseif ($vue == 'furniture') {
        $infos[] = ['Catégorie', str_replace('_', ' ', $element['category'])];
        if ($element['evenement'] != 'NA') {
            $infos[] = ['Événement', $element['evenement']];
        }
        $infos[] = ['Couleur 1', $element['couleur1']];
        $infos[] = ['Couleur 2', $element['couleur2']];

    } else {
        $infos[] = ['Espèce', $element['Species']];
        $infos[] = ['Personnalité', $element['Personality']];
        $infos[] = ['Passe-temps', $element['Hobby']];
        $infos[] = ['Anniversaire', $element['Birthday']];
        $infos[] = ['Couleur 1', $element['couleur1']];
        $infos[] = ['Couleur 2', $element['couleur2']];
    }

    // Le prix (pas pour les habitants)
    if ($vue != 'villagers') {
        if ($element['prix'] === null) {
            $infos[] = ['Prix', 'Inconnu'];
        } else {
            $infos[] = ['Prix', number_format($element['prix'], 0, ',', ' ') . ' clochettes'];
        }
    }
    ?>

    <div class="item-details">
        <?php foreach ($infos as $info): ?>
            <div class="detail <?php if ($info[0] == 'Prix') echo 'price'; ?>">
                <small><?= e($info[0]) ?></small>
                <?= e($info[1]) ?>
            </div>
        <?php endforeach; ?>
    </div>
</article>
