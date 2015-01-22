Mini-site-des-villes
====================

Création d'un mini site sur les villes avec PHP et Mysql.

But du devoir
=============

Le but de ce devoir est d'écrire un script pour ajouter un moteur de recherche au site des villes créé lors du cours
PHP intermédiaire.

Mes choix
=========

J'ai choisi d'insérer le moteur de recherche en page d'accueil, comme ce qui ce fait régulièrement sur les sites.

Lorsque l'internaute effectue une recherche, la page search.php s'ouvre et affiche les résultats (ou pas) de la recherche, 
ainsi que l'historique des recherche de l'internaute. 

Remarque : J'aurai pu ajouter l'historique sous le champs input du moteur de recherche (comme préconisé dans l'énoncé), mais j'ai trouvé que cela inapproprié.
En effet, le moteur de recherche étant sur la page d'accueil, j'ai pensé que l'historique n'avait rien à faire à cette endroit.

Fichiers à corriger
===================

L'exercice demandé fait appel à trois fichiers:

- index.php : contient le formulaire de recherche
- search.php : contient le script pour afficher les résultats et l'historique de recherche
- include/inc_search : contient les requêtes de recherche dans la table villes et l'enregistrement des résultats/utilisateur 
dans la table user_search

Ce fichier est inséré en "require()" à plusieurs endroits dansle fichier search.php, d'où sa création.

Vous trouverez également un fichier .sql pour recréer la base de données.

Remarques concernant le fichier search.php
==========================================

Dans l'énoncé, il était stipulé d'enregistrer les recherches réussies dans une table (user_search) et d'afficher l'historique 
de recherche UNIQUEMENT pour l'internaute en train de consulter le site.

Dans le cas du mini site des villes, il existe deux types d'utilisateurs : ceux connectés en tant qu'administrateur et les
autres.








