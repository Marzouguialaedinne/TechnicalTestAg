# TechnicalTest Agenna3000
Test Technique Symfony5.4

En premier lieu il faut lancer la commande ci-dessous pour installer les dépendances graçe au fichier composer.json

# composer install

D'abord Modifier le username et le password et le nom de la base de données dans le ficheir .env 

Ensuite lancer cette commande pour créer la base de données :
# php bin/console doctrine:database:create

 lancer cette commande pour créer les entités et les mapping
# php bin/console doctrine:schema:update --force 


Puis lancer cette commande pour executer Webpack   : 
# npm run dev 


Finalement lancer l'application soit avec symfony CLI ou bien avec cette commande 
# php -S 127.0.0.1:8000 -t public/




