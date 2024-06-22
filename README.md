# ZOO Arcadia

## Description
ZOO Arcadia est une application web de gestion de zoo permettant aux utilisateurs de gérer les animaux, les enclos et les employés. Cette application vise à améliorer l'efficacité opérationnelle et la gestion des ressources du zoo.

## Dépendances
- Php 8.2
- MySql 8.3
- MongoDB 7.0
- Bootstrap 5.3
- Symfony 7.0
  

## Installation
Pour installer et configurer le projet en local, suivez ces étapes :
```
git clone https://github.com/bbenx/Zoo_studi.git
cd Zoo_studi


```
Créer .env.local
```
DATABASE_URL="mysql://<utulistateur>:<password>@localhost:3306/Zoo_Arcadia_DB"
MONGODB_URL=mongodb://localhost:27017
MONGODB_DB=Animal_click

# Exemple avec mailcatcher
MAILER_DSN=smtp://127.0.0.1:1025
```

```
#Installer les dépendances PHP, executer
composer install
```

Créer mes DB
```
#MySql
bin/console d:d:c
bin/console d:m:mi
bin/console d:f:l

#MongoDB
bin/console d:m:s:c  
```

## Utilisation
Pour démarrer l'application en local :
```
symfony server:start
# Se rendre sur l'URL indiquée
```

## Fonctionnalités
**Gestion des établissements, horaires, utilisateurs, services, habitats, commentaires habitats, animaux et comptes rendus animaux:** CRUD 
**Lecture des vues par animaux**

## Contributions

Pour contribuer au projet ZOO Arcadia :

1.    Clonez le dépôt.
2.    Créez une branche pour votre fonctionnalité.
3.    Faites vos modifications et commitez-les.
4.    Poussez la branche et ouvrez une pull request


```
git checkout -b nouvelle-fonctionnalité
git commit -m "Description de la nouvelle fonctionnalité"
git push origin nouvelle-fonctionnalité
```


## Liens
- [Projet Jira](https://zoo-studi.atlassian.net/jira/software/projects/ZSA/boards/3)
- [Dépôt GitHub](https://github.com/bbenx/Zoo_studi)

##Historique des versions
Voir [CHANGELOG](https://github.com/bbenx/Zoo_studi/blob/main/CHANGELOG.md) pour les détails des versions.
