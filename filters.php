<!-- Formulaire de filtres -->
<form class="filters" method="get">
    <input type="hidden" name="view" value="<?= e($vue) ?>">

    <label class="search-field">Recherche
        <input type="search" name="q" value="<?= e($recherche) ?>" placeholder="Nom...">
    </label>

    <?php if ($est_creature): ?>
        <label>Hémisphère
            <select name="hemisphere">
                <option value="NH" <?php if ($hemisphere == 'NH') echo 'selected'; ?>>Nord</option>
                <option value="SH" <?php if ($hemisphere == 'SH') echo 'selected'; ?>>Sud</option>
            </select>
        </label>

        <label>Mois
            <select name="month">
                <?php foreach ($mois as $numero => $nom): ?>
                    <option value="<?= $numero ?>" <?php if ($mois_choisi == $numero) echo 'selected'; ?>><?= $nom ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Heure
            <input type="time" name="time" value="<?= e($heure_choisie) ?>">
        </label>

        <?php if (count($lieux) > 0): ?>
            <label>Lieu
                <select name="location">
                    <option value="">Tous</option>
                    <?php foreach ($lieux as $un_lieu): ?>
                        <option value="<?= e($un_lieu) ?>" <?php if ($lieu == $un_lieu) echo 'selected'; ?>><?= e($un_lieu) ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($vue == 'furniture'): ?>
        <label>Catégorie
            <select name="category">
                <option value="">Toutes</option>
                <?php foreach ($categories as $une_categorie): ?>
                    <option value="<?= e($une_categorie) ?>" <?php if ($categorie == $une_categorie) echo 'selected'; ?>><?= e(str_replace('_', ' ', $une_categorie)) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Événement
            <select name="event">
                <option value="">Tous</option>
                <?php foreach ($evenements as $mot => $nom_fr): ?>
                    <option value="<?= e($mot) ?>" <?php if ($evenement == $mot) echo 'selected'; ?>><?= e($nom_fr) ?></option>
                <?php endforeach; ?>
            </select>
        </label>
    <?php endif; ?>

    <?php if ($vue == 'villagers'): ?>
        <label>Espèce
            <select name="species">
                <option value="">Toutes</option>
                <?php foreach ($especes as $une_espece): ?>
                    <option value="<?= e($une_espece) ?>" <?php if ($espece == $une_espece) echo 'selected'; ?>><?= e($une_espece) ?></option>
                <?php endforeach; ?>
            </select>
        </label>

        <label>Trier par
            <select name="sort">
                <option value="name" <?php if ($tri == 'name') echo 'selected'; ?>>Nom</option>
                <option value="species" <?php if ($tri == 'species') echo 'selected'; ?>>Espèce</option>
            </select>
        </label>
    <?php else: ?>
        <label>Trier par
            <select name="sort">
                <option value="name" <?php if ($tri == 'name') echo 'selected'; ?>>Nom</option>
                <option value="price_low" <?php if ($tri == 'price_low') echo 'selected'; ?>>Prix croissant</option>
                <option value="price_high" <?php if ($tri == 'price_high') echo 'selected'; ?>>Prix décroissant</option>
            </select>
        </label>
    <?php endif; ?>

    <button type="submit">Filtrer</button>
</form>
