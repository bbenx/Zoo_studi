# ZOO Arcadia

## Description
ZOO Arcadia est une application web de gestion de zoo permettant aux utilisateurs de gérer les animaux, les enclos et les employés. Cette application vise à améliorer l'efficacité opérationnelle et la gestion des ressources du zoo.

## Installation
Pour installer et configurer le projet en local, suivez ces étapes :
```
git clone https://github.com/bbenx/Zoo_studi.git
cd Zoo_studi


```
Créer .env.local
```
DATABASE_URL="mysql://root:root@localhost:3306/Zoo_Arcadia_DB"
MONGODB_URL=mongodb://localhost:27017
MONGODB_DB=Animal_click
MAILER_DSN=smtp://127.0.0.1:1025
```
```
#Executer
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
```

## Fonctionnalités
**Gestion des animaux :** Ajout, suppression et mise à jour des informations sur les animaux.
**Gestion des enclos :** Supervision et maintenance des enclos.
**Gestion des employés :** Suivi des horaires et des tâches des employés.

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

## Tests
Pour exécuter les tests unitaires :
```
npm test
```

## Liens
- [Projet Jira](https://zoo-studi.atlassian.net/jira/software/projects/ZS/boards/2)
- [Dépôt GitHub](https://github.com/bbenx/Zoo_studi)

##Historique des versions
Voir [CHANGELOG](https://github.com/bbenx/Zoo_studi/blob/main/CHANGELOG.md) pour les détails des versions.
