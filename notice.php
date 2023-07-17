<!-- NOTICE -->
<!-- INSTALLATION -->

<!-- Au préalable Ajouter au Path du serveur Laragon la version de PHP à utiliser
Mettre la bonne version PHP en variable d'environnement sur le PC
Pour cela ouvrir le panneau d'éxécution avec Window + R et éxécuter cmd  
Dans le bios tapez php -v -->

<!-- Télécharger et installer les outils suivant: Composer - Scoop.sh - Symfony CLI (CF Vidéo Symfony6 partie 1 ) -->

<!-- 1 DEMARRER UN NOUVEAU PROJET ET AFFICHER SON ARBORESCENCE DANS VSC-->

<!-- Créer un dossier dans Laragon ouvrir le dossier avec VSC et ouvrir la consôle
Veiller à avoir le bon chemin PS C:\laragon\www\symfony\Projet> pour éxécuter la commande ci-dessous 
Taper dans la consôle après le > symfony new NomDuProjet -- webapp (pour générer le projet-->

<!-- Astuces pour utiliser la consôle efficacement : 
cls permet de rafraichir en supprimant l'historique
code . permet de lancer une nouvelle instance du projet dans une nouvelle fenêtre
ctrl + c permet de sortir d'un processus d'éxécution -->

<!-- DESCRIPTIONS -->
<!-- 
src sera le dossier le plus sollicité on y retrouve la logique métier de l'application
entities (pour peupler la BDD)
repository équivaut à Manager est contient toutes les méthodes qui vont intéragir avec la BDD (Pour infos les requêtes SQL deviennent du DQL)
Les views sont stockées dans le templates ce dossier contient le fichier base.html.twig équivaut à layout.php 
public contient les images, le fichier css, les assets,...
index.php est le point d'entrée pour accéder aux autres fichiers
.env contient la chaîne de connexion vers la BDD-->

<!-- 2 PARAMETRER LA CHAINE DE CONNEXION A LA BDD -->

<!-- Dans .env Commenter #DATABASE_URL="postgresql... et activer #DATABASE_URL="mysql://...et changer le nom d'utilisateur et le nom de la BDD -->
<!-- DATABASE_URL="mysql://root@127.0.0.1:3306/Projet" -->

<!-- 3 CREER UN MCD AVEC LOOPING CF Projet.loo -->

<!-- 4 VERIFIER SI LE PROJET EST BIEN INITIALISE -->
<!-- Pour cela il faut lancer le serveur de Symfony dans la consôle en tapant:
PS C:\laragon\www\symfony\Projet> symfony serve -d -->
<!-- Copier l'URL http://127.0.0.1:8000 et coller dans le navigateur pour afficher la page d'accueil de Symfony -->

<!-- Taper symfony server:stop pour arréter le serveur -->

<!-- 5 CREER LES ENTITES ET LEURS RELATIONS -->

<!-- Dans la consôle PS C:\laragon\www\symfony\Projet> symfony console make:entity (ou m:e) pour créer une entité
Suivre le processus de création Nom de l'entité, nom de la premiere propriété, ...(Pas besoin de renseigner l'ID cela se fait automatiquement)-->
<!-- Pour créer la relation entre deux entités reprendre la même commande 
PS C:\laragon\www\symfony\Projet>  m:e Entrprise, inscrire une nouvelle valeur (exemple : employes), 
choisir relation pour le type afin d'avoir une liste des différentes relations possible
choisir la relation souhaité et poursuivre le processus de création
Quand la realtion est établie de nouvelles fonctionnalités apparaissent dans les entités -->

<!-- 6 CREER LA BDD -->

<!-- Dans la consôle:  PS C:\laragon\www\symfony\Projet> symfony console doctrine: database:create -->

<!-- 7 MIGRATION VERS LA BDD-->

<!--Exporter les entités vers la BDD pour créer dans celle-ci les tables correspondantes en tapant
PS C:\laragon\www\symfony\Projet> symfony console make:migration (créer le contenant) ensuite tapez dans la consôle
PS C:\laragon\www\symfony\Projet> symfony console doctrine:migrations:migrate (mettre le contenu dans le contenant) -->

<!-- 8 CREER LES CONTROLLEURS -->

<!-- Dans la consôle: PS C:\laragon\www\symfony\Projet> symfony console make:controller: NomDuController (Ici EntrepriseControlleur) -->
 