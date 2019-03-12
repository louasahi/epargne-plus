# epargne-plus
Application  de gestion d'épargne pour les membres d'une petite association PHP HTML CSS BOOTSTRAPP

l'accès à l'application est protégé, pour avoir accès à l'application il faut se connecter via un
login et mot de passe fourni par l'administrateur.

***l'administrateur dispose de tous les droits sur l'application, il peut enregistrer un nouveau membre,
modifier ses informations ou même supprimer le membre. 
Pareil pour les differentes operations effectués par les membres (depot, retrait d'argent)
il peut aussi consulter les soldes des differents membres.

***Un membre ne peut que consulter ses infos, son historique de depot et retrait ansi que son solde après 
s'être connecté.

##COPIE ET INSTALLATION DE L'APPLICATION

-Telecharger et installer wampserver 3.0.6

-Cloner le repo epargne-plus depuis gihtub sur votre machine local 

-creer une base de donnée nommée epargne depuis PHPMYADMIN

-De-zipper l'archive

-Copier le dossier vers c:/wamp64/www

-Maintenant dans PHPMYADMIN importer le fichier epargne.sql qui se trouve dans le dossier 
  epargne plus précedement deplacé vers c:/wamp64/www
  
  -Vous pouvez maintenant lancer l'application .
  
  
  ##PARAMETRE DE CONNEXION
  
 connexion administrateur: 
                    
                    login: admin
                    mot de passe: admin
 connexion membres : 
                    
                    login: membre1
                    mot de passe: membre1
                    
                    login: membre2
                    mot de passe: membre2
