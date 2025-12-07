# Gestion de stock — Projet de fin d'études (DUT Télécoms & Réseaux)

Une petite application web conçue pendant mon PFE pour gérer simplement le stock d'un magasin ou d'un atelier. L'objectif était d'avoir une interface claire et légère pour ajouter/éditer des produits, enregistrer les entrées et sorties, et consulter l'historique des mouvements.

Principales fonctionnalités
- Gestion des produits : ajout, modification, suppression, recherche.
- Suivi des mouvements de stock : entrées et sorties avec historique.
- Pages pour différents rôles (magasinier, admin) avec authentification basique.
- Impression / export d'informations produit et listes (si implémenté).
- Interface frontend simple : HTML, CSS et jQuery pour l'interaction.

Technologies utilisées
- Backend : PHP (fichiers PHP côté serveur)
- Base de données : MySQL / MariaDB
- Frontend : HTML, CSS, jQuery

Structure importante du dépôt
- index.php — point d'entrée principal
- addProducts.php, listProducts.php, editProduct.php — gestion des produits
- admin/ — pages et outils admin
- config/ — fichiers de configuration (connexion DB, constantes)
- include/ — fonctions/utilitaires réutilisables
- assets/ — CSS, JS, images
- qrcodes/ — génération/stockage QR si utilisé

Utilisation rapide
- Connectez-vous avec un compte administrateur ou créez un compte si l'inscription est activée.
- Ajoutez des produits via le formulaire "Nouveau produit".
- Enregistrez les entrées et sorties depuis la section correspondante pour tenir à jour les quantités.
- Consultez l'historique pour suivre les mouvements et filtrer par période.

- Auteur : Alhassane (alhassane-coder) — Projet réalisé pour le DUT Télécoms & Réseaux.
