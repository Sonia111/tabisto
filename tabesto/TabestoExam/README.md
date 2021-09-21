# README #

### Le projet utilise : ###

* Twig
* Doctrine
* Symfony 5.2

### Comment faire fonctionner le projet  ? ###
* Installer les dépendances avec composer : composer install
* Installer API Platform : composer require api
* Lancer la commande php bin/console doctrine:database:create
* Lancer la commande avec php bin/console d:s:u 
* Ouvrir le projet http://localhost:15000/api/docs
* Avec API PLATFORM : 

- Démarre une nouvelle Adventure
  Créé un nouveau Character et l’associe à l’Adventure
  Positionne le personnage sur une première Tile

 POST /api/adventure/start
 
 - Retourne les attributs d’une Adventure
   + le Character associé
   + la Tile active
   
   GET /adventures/{id} 
- Génération d’une nouvelle Tile active
 DELETE  /api/characters/id
 
 - Le Character combat le Monster de la Tile active