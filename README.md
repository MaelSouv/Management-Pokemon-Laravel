# Management Pokemon PHP

## Résumé du projet

Ce projet est une application web développée avec le framework PHP Laravel. Elle permet de gérer une collection de Pokémon, de les afficher et de créer des "decks" personnalisés. L'application comprend un système d'authentification pour les utilisateurs.

## Structure du projet

Voici un aperçu de l'arborescence et des dossiers principaux du projet Laravel :

```
manage_pokemon/
├── app/                # Contient la logique principale de l'application
│   ├── Http/
│   │   └── Controllers/  # Les contrôleurs qui gèrent les requêtes
│   └── Models/           # Les modèles Eloquent pour interagir avec la BDD
│
├── database/           # Tout ce qui concerne la base de données
│   ├── migrations/       # Les schémas de tables de la BDD
│   └── seeders/          # Les fichiers pour remplir la BDD de données
│
├── public/             # Le seul dossier visible par les utilisateurs
│   └── index.php         # Le point d'entrée de toute l'application
│
├── resources/
│   └── views/            # Les templates HTML (fichiers Blade)
│
├── routes/             # C'est ici que sont définies toutes les URLs
│   └── web.php           # Les routes pour le navigateur web
│
└── .env.example        # Fichier d'exemple pour les variables d'environnement
```

## Prérequis

Avant de commencer, assurez-vous d'avoir installé les éléments suivants sur votre machine :

- PHP >= 8.2
- Composer
- Node.js et npm

La base de données SQLite est gérée automatiquement par le projet.

## Installation

1.  **Clonez le dépôt Git :**
    ```bash
    git clone https://github.com/Souverain71/Management-Pokemon-PHP.git
    ```

2.  **Accédez au répertoire du projet :**
    ```bash
    cd Management-Pokemon-PHP/manage_pokemon
    ```

3.  **Installez les dépendances PHP :**
    ```bash
    composer install
    ```

4.  **Créez votre fichier d'environnement :**
    Le projet est configuré pour utiliser SQLite par défaut, donc aucune modification n'est nécessaire dans ce fichier pour la base de données.
    ```bash
    # Sur Windows
    copy .env.example .env

    # Sur macOS / Linux
    cp .env.example .env
    ```

5.  **Générez la clé de l'application :**
    ```bash
    php artisan key:generate
    ```

6.  **Exécutez les migrations de la base de données :**
    Cette commande créera le fichier `database/database.sqlite` et construira la structure de la base de données.
    ```bash
    php artisan migrate
    ```

7.  **Remplissez la base de données avec les données initiales (Seed) :**
    Cela ajoutera la liste des Pokémon à votre base de données.
    ```bash
    php artisan db:seed --class=PokemonSeeder
    ```

8.  **Installez les dépendances JavaScript :**
    ```bash
    npm install
    ```

9.  **Compilez les assets front-end :**
    ```bash
    npm run build
    ```

## Lancement de l'application

Pour lancer le serveur de développement local, exécutez la commande suivante :

```bash
php artisan serve
```

L'application sera alors accessible à l'adresse [http://127.0.0.1:8000].
