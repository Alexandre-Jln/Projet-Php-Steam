# Projet-Php-Steam

Attention, c'est bien la branche "main" pour la notation du projet !

Construction de la page d'accueil.

Création de la barre de navigation avec les éléments "Accueil", "Connexion" et "Inscription", accompagnée d'un message : "Bienvenue sur notre site, cliquez sur Connexion ou Inscription pour continuer". J'ai ajouté une image de fond pour le style.

Création de la page de connexion.

Mise en place d'un formulaire de connexion simple comprenant d'abord le nom d'utilisateur, suivi du mot de passe. Ce formulaire renvoie vers une page qui confirme la connexion réussie, suivie d'une redirection vers la page de profil utilisateur.

Création de la page d'inscription.

Création d'un formulaire d'inscription demandant de renseigner le nom d'utilisateur, le nom, le prénom, l'adresse e-mail, la date de naissance et le mot de passe. Après soumission, il y a une redirection directe vers le profil de l'utilisateur. Cependant, j'ai remarqué un défaut : la barre de navigation n'est pas mise à jour avec les éléments "Accueil", "Informations du profil" et "Déconnexion". Il est donc nécessaire de se reconnecter après s'être inscrit pour obtenir la barre de navigation correcte. (Si j'ai le temps de corriger ceci, je le ferai.)

Création de la page "Informations du profil".

J'ai essayé de créer une image par défaut initialement, que j'aurais voulu ensuite stockée dans la base de données, mais je n'ai pas réussi. Ensuite, j'ai envisagé de gérer ceci lors de l'inscription, mais j'ai rencontré des difficultés importantes, alors j'ai préféré passer à autre chose. Par la suite, j'ai tenté de mettre en place le téléchargement de fichiers avec une classe, car je n'avais pas encore utilisé de classes dans mon projet. Cependant, ma classe présentait un problème avec mon fichier de classe qui n'était pas reconnu, alors j'ai préférais une autre approche. J'ai par la suite créé deux tableaux, le premier pour afficher les bans d'un joueur et lui permettre de les modifier plus tard. Le deuxième tableau visait à afficher les différents jeux d'un joueur, avec leur temps de jeu, leur catégorie, leur prix et leur note. J'ai également envisagé d'ajouter le nom d'utilisateur de l'utilisateur pour qu'il sache qu'il est bien connecté sur son compte, à côté de sa photo de profil. J'ai pensé à créer un petit tableau à droite pour récupérer et utiliser les informations d'inscription comme le nom, le prénom, l'adresse mail et l'âge de l'utilisateur. Malheureusement, faute de temps, je n'ai pas pu terminer tous cela à temps. Je voulais te donner une idée générale de la façon dont j'aurais souhaité qu'il soit dans ce dernier paragraphe.
