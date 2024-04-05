# mvc-template

## Description

MVC Template est un projet personnel qui a pour but de me servir de base pour mes futurs projets web.

Il est basé sur le modèle MVC (Modèle-Vue-Contrôleur) et utilise les technologies suivantes :

- Linux (Docker -> Debian)
- Apache
- MariaDB
- PHP

## Installation

### Prérequis

- Docker
- Docker Compose

### Installation

1. Cloner le dépôt

```
git clone https://github.com/clementfavarel/mvc-template.git
```

2. Se rendre dans le dossier du projet

```
cd mvc-template
```

3. Modifier les variables dans le fichier `docker-compose.yml` pour les adapter à votre application

4. Exécuter la commande ci-dessous (attention, le flag `--build` est à utiliser uniquement lors de la première installation ou après une modification des Dockerfiles) :

```
docker compose up -d --build
```

4. Se rendre sur [http://localhost](http://localhost)
