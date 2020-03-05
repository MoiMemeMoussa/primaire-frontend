# Programmes requis
- __Composer :__ https://getcomposer.org/download/
- __PHP :__ inclus dans Wamp, il faut juste s'assurer que la commande PHP est reconnue sur les consoles (ajouter ou modifier la variable d'environnement sinon)
- __yarn :__ https://classic.yarnpkg.com/en/docs/install/#windows-stable
- __Symfony :__ https://symfony.com/download

# Procédure d'installation du projet
L'installation du projet requiert l'utilisation de plusieurs commandes dans le dossier du projet :
- Créer le projet Symfony : __symfony new primaire-frontend__
- Créer un dossier et cloner le dépôt :
    - __git clone https://github.com/MoiMemeMoussa/primaire-frontend.git__
- Déplacer tous les fichiers du dossier _primaire-frontend_ cloné (ne pas oublier le dossier caché _.git_) dans le dossier _primaire-frontend_ créé par Symfony
- Télécharger les bundles et packages manquants :
    - __composer update__
    - __yarn install__
- Générer les fichiers CSS et JS : __yarn encore dev__
- Démarrer le serveur : __symfony server:start__
- Se rendre sur la page __http://localhost:8000/__

# Attention
- Il faudra démarrer les services REST côté java pour que les données soient utilisables par Symfony
- Cliquer sur l'onglet _Bulletins_ permet de générer des données via des requêtes POST, les autres onglets sont alors remplis de données
