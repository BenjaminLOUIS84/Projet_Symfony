<!-- NOTICE -->
<!-- INSTALLATION -->

<!-- Au préalable Ajouter au Path du serveur Laragon la version de PHP à utiliser
Mettre la bonne version PHP en variable d'environnement sur le PC
Pour cela ouvrir le panneau d'éxécution avec Window + R et éxécuter cmd  
Dans le bios tapez php -v -->

<!-- Télécharger et installer les outils suivant: Composer - Scoop.sh - Symfony CLI (CF Vidéo Symfony6 partie 1 ) -->

<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- 1 DEMARRER UN NOUVEAU PROJET ET AFFICHER SON ARBORESCENCE DANS VSC-->

<!-- Créer un dossier dans Laragon ouvrir le dossier avec VSC et ouvrir la consôle
Veiller à avoir le bon chemin PS C:\laragon\www\symfony\Projet> pour éxécuter la commande ci-dessous 
Taper dans la consôle après le > symfony new NomDuProjet -- webapp (pour générer le projet-->

<!-- Astuces pour utiliser la consôle efficacement :
cd Projet permet de changer la direction du chemin d'accès PS C:\laragon\www\symfony> ... ajouter le fichier suivant et afficher PS C:\laragon\www\symfony\Projet>
cd .. permmet de changer la direction du chemin d'accès PS C:\laragon\www\symfony> supprimer le fichier symfony et afficher PS C:\laragon\www>
cls permet de rafraichir en supprimant l'historique
code . permet de lancer une nouvelle instance du projet dans une nouvelle fenêtre
ctrl + c permet de sortir d'un processus d'éxécution -->

<!-- DESCRIPTIONS DES FICHIERS DU PROJET -->
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
<!-- Supprimer les éléments générés automatiquement la balise <style> pour le CSS et la <div> dans les fichiers index.html.twig -->
<!-- Privilégier la méthode conventionnelle avec un fichier à part pour le CSS et personnaliser soi-même les contenus -->

<!-- Méthodes pour afficher la valeur de l'argument d'un controlleur dans une vue CF VAR -->

<!-- Peupler manuellement la BDD pour tester la méthode ci dessous -->
<!-- Méthode pour afficher les valeurs issues de la BDD avec findAll() la liste des entreprises et des employés CF BDD -->

<!-- Les conditions if et les boucles for sont toujours entre {% %} dans un fichier twig -->
<!-- Pour concaténer dans un fichier twig on utilise le ~ à la place du . 
{{ entreprise.raisonSociale ~ ' (' ~ entreprise.cp ~ ' ' ~ entreprise.ville ~ ')'}} -->

<!-- Autre méthode en créeant une fonction __toString() dans le fichier Entreprise.php du dossier Entity
Cela permet de convertir en chaîne de caractère et cela simplifie le code  -->

<!-- Autre méthode pour simplifier le code, il faut mettre dans l'index du contrôlleur EntrepriseRepository $entrepriseRepository
à la place de EntityManagerInterface $entityManager et importer cette classe dans EntrepriseController CF ASTUCE -->

<!-- Utiliser le filtre pour afficher par ordre alphabétique avec la fonction findBy() 
(remplacer la fonction findAll() dans le controlleur)-->

<!-- Utiliser le filtre pour afficher les entrprises de Strasbourg avec la fonction findBy() 
(remplir le tableau vide [] de la fonction findBy() dans le controlleur)-->

<!-- Pour afficher la liste des employés de l'entrprise DEV COOK   
(ajouter dans la boucle du fichier twig {{ employe.entreprise.raisonSociale }})-->

<!-- Créer une barre de navigation pour basculer d'une liste à l'autre dans le fichier twig base
Le lien de navigation se fait avec le chemin d'accès {{ path ('') }} et le name dans le controlleur,
il suffit de copier/coller le name dans le path  {{ path ('app_entreprise') }}  -->

<!-- 9 METTRE A JOUR UNE ENTITE -->

<!-- Dans la console reprendre la commande PS C:\laragon\www\symfony\Projet> symfony console make:entity Nom de l'entité à modifier
Ajouter la propriété ville en suivant le procesus de création, vérifier dans le fichier Employe.php si les getter et setter sont ajoutés

ATTENTION Faire la migration pour mettre à jour la BDD risque de supprimer le peuplage de la table
donc il faut dans la console mettre la commande suivante [symfony console doctrine:schema:update --force (ou d:s:u --force)]-->

<!-- 10 AFFICHER LE DETAIL D'UNE ENTREPRISE ET D'UN EMPLOYE -->

<!-- Rendre les éléments de la liste cliquable, on click sur une entreprise pour afficher toutes les infos de celle-ci ainsi que ses employés -->
<!-- Pour cela, il faut mettre en place des liens dans le fichier twig du dossier entreprise (au passage je limite l'affichage des éléments ce cette liste
à la raison sociale dans le fichier Entreprise.ph)
(Pour la liste des employés, il suffit de supprimer {{ employe.entreprise.raisonSociale }} dans le fichier twig du dossier employe
afin de limiter l'affichage au noms et prénoms)-->

<!-- Dans les controlleurs il faut créer une nouvelle méthode fonction show() pour afficher le détail,
ensuite il faut reprendre la route en ajoutant /{id} à l'URL et en changeant le nom du name -->

<!-- {id} Sert de clé primaire pour récupérer l'objet et pas besoin de le renommer autrement.
En effet il est suffisant car PARAM CONVERTER, un outil de Symfony permet de récupérer par déduction l'objet en question -->

<!-- Créer la view show.html.twig dans le dossier entreprise qui reçoit le détail de l'entreprise à afficher
et copier/coller la structure fichier index.html.twig dans la nouvelle vue CF show.html.twig -->

<!-- Créer et placer le lien {{ path ('show_entreprise') }} dans le href=" " du fichier index.html.twig du dossier entreprise
pour établir la connexion entre le controllerEntreprise et la view show.html.twig 

ATTENTION Il faut aussi ajouter le paramêtre de l'URL {id} soit {id: entreprise.id} pour bien récupérer l'objet entreprise de l'identidfiant
Ainsi la connexion sera fonctionnelle-->

<!-- Procéder ainsi pour la partie concernant les employés -->

<!-- Créer une fonction getAdresseComplete() dans le fichier Entreprise.php pour simplifier le code du fichier show.html.twig du dossier Entreprise --> 

<!-- Formater les datetimes pour les convertir en string et par conséquent afficher celle-ci dans le détail des entreprises et des employés
Pour cela, 
soit dans le fichier Entreprise.php dans le getDateCreation faire un format->("d-m-Y") et modifier le type en string (mais c'est pas conseillé); 
soit dans ce même fichier créer une méthode getDateCreationFr en reprenant les instructions ci dessus 
soit directement dans le fichier twig avec le filtre |date ("d-m-Y") -->

<!-- Il existe de nombreux filtres à utiliser dans twig! CF twig.symfony.com-->














<!-- ------------------------------------------------------------------------------------------------------------------------------------------- -->

<!-- EXTENSIONS A INSTALLER -->
<!-- 
Twig Pack (plutôt que Twig Language 2)
PHP NameSpace pour importer des classes avec le click droit
 -->

<!-- COMMANDES SYMFONY -->
<!-- 
Créer un nouoveau projet
symfony new NomDuProjet --full

Lancer le serveur de Symfony
symfony server:start 
symfony serve
symfony server:start -d (pour lancer le serveur en arrière-plan)
symfony serve -d

Stopper le serveur
symfony server:stop

Créer une nouvelle entity (ou mettre à jour une entity existante)
symfony console make:entity (ou m:e)

Créer la base de données
symfony console doctrine:database:create

Effectuer la migration (2 étapes !)
symfony console make:migration (ou m:mi)
symfony console doctrine:migrations:migrate (ou d:m:m)

Mettre à jour la base de données après ajout d'un attribut dans une entité
symfony console doctrine:schema:update --force (ou d:s:u --force)

Créer un nouveau controller
symfony console make:controller NomDuControlleur (ou m:con)

Créer un nouveau form type
symfony console make:form

Vider le cache
symfony console cache:clear

Commandes liées à l'authentification
symfony console make:user
symfony console make:registration-form
symfony console make:auth

Vérification d'email + reset password
composer require symfonycasts/verify-email-bundle
composer require symfonycasts/reset-password-bundle
symfony console make:reset-password
-->