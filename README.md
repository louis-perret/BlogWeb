# ProjetBlog

Contexte : Projet réalisé en programmation web
Sujet : Gestion d'un blog
Auteur : Perret Louis & Jules Duteyrat de la promotion 2021/2022
Langages utilisés : 
	-HTML/CSS avec le framework Bootstrap pour les vues (front)
	-PHP (back)

Architecture du projet :
1. Dossier Vues -> contient nos différentes vues (page principale, page de connexion...) ainsi que le style css de ces dernières
2. Dossier Images -> contient les images utilisées par la vue
3. Dossier Modele -> contient nos deux modèles utilisées pour manipuler nos données (bd,session,cookie)
4. Dossier Metier -> contient nos classes métiers
5. Dossier DAL -> contient nos gateways associées à nos classes métiers,la classe connexion pour se connecter à notre bd ainsi que nos fabriques
6. Dossier Controleurs -> contient nos deux contrôleurs ainsi que notre front controller
7. Dossier Config -> contient notre autoloader,notre classe validation ainsi que notre fichiers config
8. dbjuduteyrat.sql -> fichier permettant de créer notre base de données

Remarque : le fichier config.php permet de modifier les paramètres de connexion à la base de données au besoin.
Patrons d'architecture utilisés : 
	-MVC
	-Front controller

Patrons de conception utilisés :
	-Fabrique simple
