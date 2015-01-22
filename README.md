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

Pour les utilisateurs connectés, j'utilise la session pour identifier l'internaute et ensuite enregistrer les recherches dans la table user_search.

Pour les utilisateurs non connectés, je créé un cookie, nommé userID, dans lequel il est enregistré un identifiant généré par
la fonction uniqid(). Ce cookie est valable 3 mois (je trouve que c'est déjà assez long!).

Ensuite, on registre les recherches dans la table user_search et pour l'historique on se sert du cookie.


Points à améliorer
==================


Quand l'internaute effectue une recherche pour la première fois, l'historique affiche tout de suite les résultats de cette
première recherche. J'aurai préférer que l'historique ne s'affiche qu'à partir de sa deuxième visite. Pour cela, il aurait 
peut-être fallu créer un cookies "nb_visit", mais cela aurait encore alourdi le code.


La table user_search enregistre tous les résultats de recherche associés à un utilisateur. Le nombre d'entrée devient
rapidement très élevé. J'avais pensé à n"enregistrer que les couples userID/recherches une seule fois en faisant 
un "select", puis une comparaison entre les variables UserID et result_search. Cela aurait permit de ne pas utiliser
un GROUP BY lors de la requête d'affichage de l'historique. 
Néanmoins, si le site compte plusieurs milliers de visiteurs uniques par jour, la table user_search serait rapidement très longue.

Peut-être on aurait pu effacer automatiquement les entrées les plus anciennes. Mais je ne 
vois pas comment faire cela...




