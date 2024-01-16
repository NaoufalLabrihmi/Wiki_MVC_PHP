# Détails du Site Wiki(Blog)

## Présentation
Le site Wiki permet aux utilisateurs, après authentification, de publier des wikis (articles) et de laisser des commentaires. Le site est développé en utilisant les technologies suivantes : Bootstrap, PHP, CSS, HTML, JS, AJAX.

## Partie Back Office

### Gestion des Catégories (Admin)
- Créer, modifier et supprimer des catégories pour organiser le contenu.
- Associer plusieurs wikis à une catégorie.

### Gestion des Tags (Admin)
- Créer, modifier et supprimer des tags pour faciliter la recherche et le regroupement du contenu.
- Associer des tags aux wikis pour une navigation plus précise.

### Inscription des Auteurs
- Les auteurs peuvent s'inscrire en fournissant des informations de base comme le nom, l'adresse e-mail et un mot de passe sécurisé.

### Gestion des Wikis (Auteurs et Admins)
- Créer, modifier et supprimer leurs propres wikis.
- Associer une seule catégorie et plusieurs tags à leurs wikis pour faciliter l'organisation et la recherche.
- Les admins peuvent archiver des wikis inappropriés.

### Tableau de Bord
- Page d'accueil avec consultation des statistiques des entités via le tableau de bord.

## Partie Front Office

### Authentification (Login et Register)
- Les utilisateurs peuvent créer un compte en fournissant des informations de base.
- Connexion à leurs comptes existants.
- Redirection vers le tableau de bord pour les administrateurs, sinon vers la page d'accueil.

### Barre de Recherche
- Barre de recherche AJAX pour trouver des wikis, des catégories et des tags sans actualisation de la page.

### Affichage des Derniers Wikis
- Section sur la page d'accueil affichant les derniers wikis ajoutés pour un accès rapide au contenu le plus récent.

### Affichage des Dernières Catégories
- Section présentant les dernières catégories créées ou mises à jour pour découvrir rapidement les thèmes récemment ajoutés.

### Redirection vers la Page Unique des Wikis
- En cliquant sur un wiki, redirection vers une page dédiée offrant des détails complets sur le contenu, les catégories, les tags et les informations sur l'auteur.

### Gestion des Publicités (Ads)
- Possibilité d'afficher des publicités sur la plateforme.
- L'administrateur peut ajouter des annonces dans les pages du site avec une durée de validité définie.

## Technologies Requises

### Frontend
- HTML5, CSS Framework(Bootstrap), Javascript.

### Backend
- PHP 8 avec architecture MVC.
- Database: PDO driver.

### Fonctionnalités Additionnelles

- Upload d'images en PHP avec gestion de formats, validation des types de fichiers et stockage sécurisé.
- Architecture MVC avec système de routage et autoload.
- Gestion des permissions : l'admin peut accorder des permissions aux utilisateurs, ainsi qu'archiver des utilisateurs, des tags, des catégories, des wikis et des annonces.
