# 🍽️ Restaurant Saveur — Site Web

Site web d'un restaurant français fictif **Saveur**, permettant aux clients de consulter le menu, de créer un compte, de se connecter et de soumettre une demande de réservation en ligne.

---

## ✨ Fonctionnalités

- **Page d'accueil** — Présentation du restaurant (hero, histoire, menu, réservation) accessible uniquement après connexion
- **Inscription** — Création de compte avec validation de l'email et confirmation du mot de passe
- **Connexion / Déconnexion** — Authentification par session PHP
- **Réservation en ligne** — Formulaire pré-rempli avec les infos du compte (nom, email, téléphone), choix du nombre de convives et message libre
- **Menu du restaurant** — Affichage des entrées et plats principaux avec leurs prix
- **Navigation responsive** — Menu burger mobile avec scroll fluide entre les sections
- **Mode sombre** — Détection automatique via `prefers-color-scheme`

---

## 🗂️ Structure du projet

```
Restaurant-Saveur-master/
│
├── vues/
│   ├── index.php          # Page principale (accueil, menu, réservation) — accès protégé
│   ├── login.php          # Formulaire de connexion
│   └── register.php       # Formulaire d'inscription
│
├── controllers/
│   ├── login.php          # Authentification et démarrage de session
│   ├── register.php       # Création de compte avec validation
│   ├── reservation.php    # Enregistrement d'une réservation
│   └── deconnexion.php    # Destruction de session et redirection
│
├── DAO/
│   ├── userClass.php          # Entité User
│   ├── userDAO.php            # Interface UserDAO
│   ├── userDaoImpl.php        # Implémentation (PDO)
│   ├── reservationClass.php   # Entité Reservation
│   ├── reservationDAO.php     # Interface ReservationDAO
│   └── reservationDaoImpl.php # Implémentation (PDO)
│
├── DB/
│   └── ConnexionDB.php    # Singleton de connexion PDO à MySQL
│
├── styles/
│   ├── styles.css          # Styles de la page principale
│   ├── styles-login.css    # Styles de la page de connexion
│   └── styles-register.css # Styles de la page d'inscription
│
├── main.js                # Navigation, animations, scroll, dark mode
│
└── Docs/
    ├── Diagramme_Use_Case.png
    ├── Diagramme_de_classe.png
    ├── Diagramme_activite_login.png
    ├── Diagramme_activite_register.png
    └── Diagramme_activite_reservation.png
```

---

## 🔄 Navigation entre les pages

```
login.php ──────────────────► index.php (accueil)
    │                              │
    ▼                              ▼
register.php              reservation.php (controller)
    │                              │
    └──────► login.php ◄───────────┘
                    ▲
             deconnexion.php
```

---

## 🏗️ Architecture

Le projet suit le patron **MVC** (Modèle – Vue – Contrôleur) :

- **Modèles** : classes entités dans `DAO/` (`User`, `Reservation`) avec interfaces DAO et implémentations PDO
- **Vues** : fichiers PHP dans `vues/` (HTML + PHP minimal)
- **Contrôleurs** : fichiers PHP dans `controllers/` (traitement des formulaires POST, redirections)

### Base de données MySQL

**Table `user`**

| Champ | Type | Description |
|---|---|---|
| `id` | INT PK AUTO | Identifiant |
| `nom` | VARCHAR | Nom de famille |
| `prenom` | VARCHAR | Prénom |
| `telephone` | VARCHAR | Numéro de téléphone |
| `email` | VARCHAR | Adresse email (utilisée pour la connexion) |
| `password` | VARCHAR | Mot de passe |

**Table `reservation`**

| Champ | Type | Description |
|---|---|---|
| `id` | INT PK AUTO | Identifiant |
| `nombre_personnes` | VARCHAR | Tranche de convives sélectionnée |
| `message` | TEXT | Message libre du client |
| `date` | DATETIME | Horodatage automatique de la réservation |
| `user_id` | INT FK | Référence vers l'utilisateur connecté |

---

## 🛠️ Stack technique

| Élément | Valeur |
|---|---|
| Back-end | PHP (architecture MVC) |
| Base de données | MySQL via PDO |
| Front-end | HTML5, CSS3, JavaScript vanilla |
| Sessions | PHP `$_SESSION` |
| Connexion DB | Singleton `ConnexionDB` |

---

## ⚙️ Installation

### Prérequis

- **PHP** 7.4+
- **MySQL** 5.7+ (ou MariaDB)
- Un serveur local type **XAMPP**, **WAMP**, **Laragon** ou **MAMP**

### Étapes

1. Cloner ou déposer le projet dans le dossier `htdocs/` (XAMPP) ou équivalent

2. Créer la base de données MySQL :
   ```sql
   CREATE DATABASE saveur CHARACTER SET utf8 COLLATE utf8_general_ci;
   USE saveur;

   CREATE TABLE user (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nom VARCHAR(100),
       prenom VARCHAR(100),
       telephone VARCHAR(20),
       email VARCHAR(150),
       password VARCHAR(255)
   );

   CREATE TABLE reservation (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre_personnes VARCHAR(20),
       message TEXT,
       date DATETIME,
       user_id INT,
       FOREIGN KEY (user_id) REFERENCES user(id)
   );
   ```

3. Configurer les identifiants de connexion dans `DB/ConnexionDB.php` :
   ```php
   $host     = "localhost";
   $dbname   = "saveur";
   $username = "root";
   $password = "VOTRE_MOT_DE_PASSE";
   ```

4. Accéder à l'application via `http://localhost/Restaurant-Saveur-master/vues/login.php`
