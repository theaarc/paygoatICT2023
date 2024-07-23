# PayGoatICT2023

PayGoatICT2023 est un projet d'application web conçu pour simplifier les transactions financières et la gestion pour les petites entreprises. Ce dépôt contient le code source et les fichiers de configuration nécessaires pour configurer et exécuter l'application.

## Table des matières

- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Structure des dossiers](#structure-des-dossiers)
- [Contribuer](#contribuer)
- [Licence](#licence)

## Installation

Pour commencer avec PayGoatICT2023, suivez ces étapes :

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/theaarc/paygoatICT2023.git
   cd paygoatICT2023
   ```

2. Installez les dépendances :
   ```bash
   composer install
   ```

3. Configurez vos variables d'environnement en copiant le fichier `.env.example` en `.env` et en le modifiant selon votre configuration :
   ```bash
   cp .env.example .env
   ```

4. Générez la clé de l'application :
   ```bash
   php artisan key:generate
   ```

5. Exécutez les migrations et seed de la base de données :
   ```bash
   php artisan migrate --seed
   ```

## Configuration

Assurez-vous de mettre à jour le fichier `.env` avec vos paramètres de base de données et autres configurations.

## Utilisation

Pour démarrer le serveur de développement, utilisez la commande suivante :
```bash
php artisan serve
```

Accédez à l'application à `http://localhost:8000`.

## Structure des dossiers

- `app` : Contient le code principal de l'application.
- `bootstrap` : Gère le démarrage de l'application.
- `config` : Contient les fichiers de configuration.
- `database` : Inclut les fichiers de migration, seed et factory.
- `public` : Les fichiers accessibles publiquement tels que index.php.
- `resources` : Contient les fichiers de vue et les assets.
- `routes` : Contient toutes les définitions de routes.
- `storage` : Gère le stockage des fichiers.
- `tests` : Contient les cas de test.
- `.env.example` : Exemple de configuration d'environnement.
- `composer.json` : Dépendances PHP.
- `package.json` : Dépendances Node.js.
- `webpack.mix.js` : Fichier de configuration pour Laravel Mix.

## Contribuer

Les contributions sont les bienvenues ! Veuillez ouvrir une issue ou soumettre une pull request pour tout changement ou amélioration.
