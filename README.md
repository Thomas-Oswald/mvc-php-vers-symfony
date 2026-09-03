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