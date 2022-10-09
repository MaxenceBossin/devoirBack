Devoir Maxence Bossin | Projet réalisation platforme de montre connecté

Sommaire 
1. Brief
2. Technologie choisie
3. Partie fonctionnelle

Brief
Réalisation d'une plateforme permettant d'acheter des montres connecté, le site devrai gérer de gros volume.
Un utilisateur devra se connecter pour ajouter une ou plusieurs montre à son panier et les achetés.

Technologie choisie
Back-end : Symfony -> réalisation d'un système d'api
Front-end : Symfony
Base de données : PostGre : efficace pour gérer de gros volume
[Liens doc API POSTMAN](https://app.getpostman.com/join-team?invite_code=47d37b022a7401057140bd0f66dee168&target_code=1d3797762e961413b81c1067e5728a7c)
En local lancer le projet sur le port 8000


Partie fonctionnelle

Opérationnel:
- Liste de montre 
- Montre détail
- Inscription
- base de données sur postgre
- systeme d'api

Existante mais non-fonctionnelle:
- Login avec JWT, récupération sur postman mais pas en front

Fonctionnalité a ajouté:
- Vérification du login sécurisé : actuellement, un login temporaire a été mis en place, mais la connexion n'est pas sécurisée.
- mise en place d'un système d'ajout au panier, cependant la table ordered existe déjà pour mettre en place la fonctionnalité
- Mise en place d'un système de paiement  
- Mise en place d'une page Admin : il existe une api pour ajouter de nouvelle montre (il manque l'ajout d'image)
