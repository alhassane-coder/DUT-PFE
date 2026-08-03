# Gestion de stock — Projet de fin d'études (DUT Télécoms & Réseaux)

Application web de gestion de stock développée en PHP/MySQL dans le cadre de mon PFE. Elle permet de gérer les produits d'un magasin, de suivre l'historique des mouvements, de lancer des appels d'offre aux fournisseurs et de générer des QR codes pour chaque produit.

Démo en ligne : https://dutpfe.freehosting.dev

## Fonctionnalités

- **Gestion des produits** : ajout, modification, suppression, recherche, génération de QR code.
- **Appels d'offre** : l'informaticien lance un appel d'offre, les fournisseurs y répondent, nouveautés publiées.
- **Historique** : chaque action (connexion, ajout, modification, suppression) est tracée avec date en français.
- **Gestion des comptes** : création, blocage/déblocage des informaticiens, activation des fournisseurs par email.
- **Impression** : fiche produit et liste des produits imprimables.
- **4 rôles distincts** avec dashboards séparés :

| Rôle | Page de connexion |
|---|---|
| Super Admin (Directeur) | `supadminLogin.php` |
| Informaticien | `adminLogin.php` |
| Magasinier | `magLogin.php` |
| Fournisseur | `fournissLogin.php` |

## Comptes de démonstration (mot de passe : `123456`)

- Super Admin : `admin`
- Informaticien : `info`
- Magasinier : `mag1`
- Fournisseur : à créer via l'inscription (activation par email)

## Technologies

- Backend : PHP (PDO, requêtes préparées, mots de passe bcrypt)
- Base de données : MySQL / MariaDB
- Frontend : HTML, CSS, jQuery, Bootstrap, Parsley.js, Alertify.js
- QR codes : génération via API externe

## Installation

1. Importer `database.sql` dans votre base MySQL (créé les 9 tables + comptes initiaux).
2. Configurer la connexion dans `config/database.php` (hôte, base, utilisateur, mot de passe, `SITE_URL`).
3. Placer le dossier sur un serveur PHP 8+ (Apache ou similaire).
4. Vérifier que le dossier `qrcodes/` est inscriptible (images des QR codes).

## Structure

- `index.php` — point d'entrée principal
- `addProducts.php`, `listProducts.php`, `editProduct.php` — gestion des produits
- `addOffer.php`, `listAnswers.php` — appels d'offre et réponses
- `register.php`, `activation.php` — inscription et activation des fournisseurs
- `admin/` — pages et outils du Super Admin
- `views/` — vues HTML des pages
- `config/` — configuration (connexion DB, constantes)
- `include/` — fonctions réutilisables (`french_date()`, validation, flash)
- `templates/emails/` — modèles d'emails (activation)
- `assets/` — CSS, JS, images
- `qrcodes/` — QR codes générés

## Auteur

Alhassane (alhassane-coder) — Projet réalisé pour le DUT Télécoms & Réseaux.
