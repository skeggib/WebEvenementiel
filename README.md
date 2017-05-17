# WebEvenementiel

Gestion d’événements en ligne.

## Installation

### Prérequis

**Linux** :

- Apache2
- PHP5
- MySQL
- Avoir décommenté les lignes `extension=pdo.so` et `extension=pdo_mysql.so` du fichier `/etc/php.ini`

**Windows** :

- WAMP
- Avoir ajouté le chemin de PHP dans la variable d'environnement PATH

### Base de données

- Créer un utilisateur (protégé par mot de passe)
- Se connecter avec l'utilisateur créé
- Créer une base de donnée

### Configuration

- Se placer dans le dossier racine du projet
- Lancer `php script/configuration.php` et suivre les instructions

Un fichier de configuration "webevents.ini" sera généré à la racine et les tables de la base de données seront créées.