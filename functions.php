<?php
// ---------- Fonctions utilitaires ----------

// Protège un texte avant de l'afficher dans la page HTML
function e($texte)
{
    return htmlspecialchars((string) $texte, ENT_QUOTES, 'UTF-8');
}

// Lien vers une autre page de résultats en gardant les filtres actuels
function lien_page($numero)
{
    $parametres = $_GET;
    $parametres['page'] = $numero;
    return '?' . http_build_query($parametres);
}

// Adresse de l'image d'un élément (selon la catégorie)
function adresse_image($vue, $nom_fichier)
{
    if ($vue == 'furniture') {
        $dossier = 'FtrIcon';
    } elseif ($vue == 'villagers') {
        $dossier = 'NpcIcon';
    } else {
        $dossier = 'MenuIcon';
    }
    return 'https://nh-cdn.catalogue.ac/' . $dossier . '/' . $nom_fichier . '.png';
}
