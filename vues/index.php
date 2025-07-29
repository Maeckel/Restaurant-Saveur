<!DOCTYPE html>
<?php
// Affiche les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../DAO/userClass.php';
session_start();

if(isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id = $user->getId();
    $name = $user->getNom();
    $phone = $user->getPhone();
    $email = $user->getEmail();
} else {
    header("Location: login.php");
    exit();
}


$messages = [
    1 => "Réservation enregistré !",
];
$erreurCode = $_GET['erreur'] ?? null;
$erreur = $messages[$erreurCode] ?? null;
?>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Saveur</title>
    <meta name="description" content="Un voyage culinaire à travers la cuisine française moderne" />
    <meta name="author" content="Saveur" />
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<header class="header">
    <nav class="navbar">
        <div class="nav-brand">SAVEUR</div>
        <button class="nav-toggle" aria-label="toggle navigation">
            <span class="hamburger"></span>
        </button>
        <ul class="nav-menu">
            <li><a href="#" class="nav-link">Accueil</a></li>
            <li><a href="#about" class="nav-link">Notre Histoire</a></li>
            <li><a href="#menu" class="nav-link">Menu</a></li>
            <li><a href="#reservation" class="nav-link">Réservations</a></li>
            <li><a href="../controllers/deconnexion.php" class="nav-link">Se déconnecter</a></li>
        </ul>
    </nav>
</header>
<main>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1 class="hero-title">SAVEUR</h1>
            <p class="hero-subtitle">Un voyage culinaire à travers la cuisine française moderne</p>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="container">
            <div class="section-header">
                <h2>Notre Histoire</h2>
                <div class="divider"></div>
                <p>
                    Niché au cœur de la ville, Saveur apporte l'essence de l'art culinaire français
                    à votre table. Notre engagement envers l'excellence se reflète dans chaque plat que nous servons,
                    alliant techniques traditionnelles et innovation moderne.
                </p>
            </div>
            <div class="about-images">
                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb" alt="Intérieur du restaurant" class="about-image">
                <img src="https://images.unsplash.com/photo-1618160702438-9b02ab6515c9" alt="Chef préparant un plat" class="about-image">
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu" id="menu">
        <div class="container">
            <div class="section-header">
                <h2>Menu</h2>
                <div class="divider"></div>
            </div>
            <div class="menu-sections">
                <div class="menu-category">
                    <h3>Entrées</h3>
                    <div class="menu-items">
                        <div class="menu-item">
                            <div class="menu-item-content">
                                <h4>Soupe à l'Oignon</h4>
                                <p>Oignons caramélisés, bouillon de bœuf, fromage gruyère</p>
                            </div>
                            <span class="menu-item-price">18€</span>
                        </div>
                        <div class="menu-item">
                            <div class="menu-item-content">
                                <h4>Foie Gras</h4>
                                <p>Terrine de foie de canard, brioche, confiture de figues</p>
                            </div>
                            <span class="menu-item-price">24€</span>
                        </div>
                    </div>
                </div>
                <div class="menu-category">
                    <h3>Plats Principaux</h3>
                    <div class="menu-items">
                        <div class="menu-item">
                            <div class="menu-item-content">
                                <h4>Coq au Vin</h4>
                                <p>Poulet braisé, sauce au vin rouge, petits oignons, champignons</p>
                            </div>
                            <span class="menu-item-price">38€</span>
                        </div>
                        <div class="menu-item">
                            <div class="menu-item-content">
                                <h4>Bœuf Bourguignon</h4>
                                <p>Bœuf mijoté, réduction de vin rouge, légumes racines</p>
                            </div>
                            <span class="menu-item-price">42€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reservation Section -->
    <section class="reservation" id="reservation">
        <div class="container">
            <div class="section-header">
                <h2>Réservations</h2>
                <div class="divider"></div>
                <p>Pour les réservations, veuillez nous appeler ou réserver en ligne</p>
            </div>
            <div class="contact-info">
                <div class="contact-block">
                    <h3>Contact</h3>
                    <p>+1 (555) 123-4567</p>
                    <p>info@saveur.com</p>
                </div>
                <div class="contact-block">
                    <h3>Horaires</h3>
                    <p>Mardi - Dimanche</p>
                    <p>17h30 - 22h00</p>
                </div>
                <?php if (isset($erreur)) { ?>
                    </br>
                    <h4><?php echo htmlspecialchars($erreur); ?></h4>
                <?php } ?>
            </div>

            <!-- Contact Form -->
            <form id="contact-form" class="contact-form" method="post" action="../controllers/reservation.php">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($phone) ?>" readonly required>
                </div>
                <div class="form-group">
                    <label for="guests">Nombre de personnes</label>
                    <select id="guests" name="guests" required>
                        <option value="">Sélectionnez</option>
                        <option value="1-2">1-2 personnes</option>
                        <option value="3-4">3-4 personnes</option>
                        <option value="5-6">5-6 personnes</option>
                        <option value="7+">7 personnes ou plus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Envoyer</button>
            </form>
        </div>
    </section>
</main>
<script src="main.js"></script>
</body>
</html>