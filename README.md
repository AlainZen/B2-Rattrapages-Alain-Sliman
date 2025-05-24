# 🍽️ Dashboard de Gestion - Restaurants et Employés en Symfony

## À propos
Bienvenue sur le dépôt de mon projet de gestion de restaurants et d'employés !
Il s'agit d'une plateforme développée avec Symfony, permettant de gérer des restaurants et des employés.

## ⚠️ Note : Ce projet est en développement et ne représente pas une plateforme réelle.

 **Technologies utilisées**
- 🐘 PHP 8+ – Langage backend
- 🎵 Symfony 6+ – Framework MVC robuste et évolutif
- 🛢️ MySQL – Base de données
- 🔐 Security Bundle – Gestion des utilisateurs et de l'authentification

## 🎥 Voir la vidéo explicative
https://youtu.be/6hWmRXCSbXE  Vidéo en non-répertoriée

## 📦 Installation & Exécution
Si vous souhaitez exécuter ce projet en local, voici les étapes :

### 1️⃣ Cloner le dépôt
```bash
git clone https://github.com/AlainZen/B2-Rattrapages-Alain-Sliman.git
cd B2-Rattrapages-Alain-Sliman
```

### 2️⃣ Installer les dépendances
```bash
composer install
```

### 3️⃣ Configurer l’environnement
Copiez le fichier `.env` et configurez votre base de données :
```bash
cp .env .env.local
```
Modifiez ensuite .env.local pour ajouter vos informations de connexion à la base de données :

```bash
DATABASE_URL="mysql://root:@127.0.0.1:3306/mongoo_db?serverVersion=8.0"
```

### 4️⃣ Importer la base de données
Importez le fichier `database_dump.SQL dump` dans votre base de données MySQL.

**Note :** Les données sont déjà incluses dans le dump SQL, donc il n'est pas nécessaire d'utiliser les fixtures.

### 5️⃣ Lancer le serveur Symfony
```bash
symfony server:start
```
L'application sera accessible sur http://127.0.0.1:8000.

## 📌 Fonctionnalités

- ✅ Ajout, modification et suppression de restaurant
- ✅ Ajout, modification et suppression d'employés
- ✅ Gestion des relations entre employés et restaurants
- ✅ Interface responsive

## 🚧 Statut
Le projet est en développement. De nouvelles fonctionnalités pourront être ajoutées prochainement.
