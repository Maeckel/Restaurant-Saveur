<!DOCTYPE html>

<?php
$messages = [
    1 => "Email ou mot de passe incorrect !",
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
    <link rel="stylesheet" href="../styles/styles-login.css">
  </head>
  <body>
    <header class="header">
      <nav class="navbar">
        <div class="nav-brand">SAVEUR</div>
        <button class="nav-toggle" aria-label="toggle navigation">
          <span class="hamburger"></span>
        </button>
        <ul class="nav-menu">
          <li><a href="register.php" class="nav-link">Créer un compte</a></li>
        </ul>
      </nav>
    </header>
      <section class="reservation" id="reservation">
        <div class="container">
            <div class="section-header">
                <h1>Connexion - Restaurant Saveur</h1>
                <h4>Veuillez remplir le formulaire ci-dessous</h4>
                <?php if (isset($erreur)) { ?>
                    </br>
                    <h4><?php echo htmlspecialchars($erreur); ?></h4>
                <?php } ?>
            </div>
            <form id="contact-form" class="contact-form" action="../controllers/login.php" method="post">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="submit-btn">Envoyer</button>
          </form>
        </div>
      </section>
  </body>
</html>