# MVC pédagogique en PHP

## Objectif

Explique ici pourquoi tu construis ce MVC.

## Technologies

- PHP 8.4
- Composer
- Git et GitHub

## Progression

- [x] Préparer l’environnement
- [x] Initialiser le dépôt Git
- [x] Créer le Front Controller
- [x] Créer un routeur statique
- [x] Ajouter une route dynamique `/products/{id}`
- [x] Séparer le chemin des paramètres de requête

## Architecture actuelle

Navigateur → serveur PHP → `public/index.php`

Le Front Controller est le point d’entrée unique de l’application. Il récupère actuellement la méthode HTTP et l’URI demandée.

## Route dynamique

La route `/products/{id}` utilise une expression régulière pour récupérer un identifiant numérique. La valeur capturée dans `$matches[1]` est convertie en entier.

## Paramètres de requête

`parse_url()` extrait le chemin utilisé par le routeur. Les paramètres placés après `?` sont accessibles dans `$_GET`. L’opérateur `??` fournit une valeur par défaut lorsqu’un paramètre est absent.

## Les contrôleurs

Le fichier `public/index.php` est le Front Controller : toutes les requêtes HTTP passent par lui.

Il identifie la méthode et le chemin demandés, puis appelle le contrôleur correspondant.

- `HomeController` gère la page d'accueil.
- `ProductController::index()` gère la liste des produits.
- `ProductController::show()` gère la fiche d'un produit.

Les contrôleurs sont placés dans `src/Controller`.

Pour le moment, ils sont chargés manuellement avec `require_once`. Cette étape sera ensuite automatisée avec Composer et l'autoloading PSR-4.

## Séparation des vues

Les contrôleurs ne contiennent plus directement le HTML.

Chaque contrôleur charge une vue située dans le dossier `templates` :

- `HomeController::index()` charge `templates/home/index.php`.
- `ProductController::index()` charge `templates/product/index.php`.
- `ProductController::show()` charge `templates/product/show.php`.

Les données préparées dans une méthode du contrôleur, comme `$sort` ou `$id`, sont accessibles dans la vue chargée par cette méthode.

## Composer et l'autoloading PSR-4

Composer charge automatiquement les classes du projet.

La configuration `"App\\": "src/"` signifie que le namespace `App` correspond au dossier `src`.

Par exemple :

`App\Controller\ProductController` correspond à `src/Controller/ProductController.php`.

Le fichier `vendor/autoload.php` remplace les `require_once` écrits manuellement pour chaque classe.