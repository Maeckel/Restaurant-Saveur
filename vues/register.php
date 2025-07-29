<!DOCTYPE html>

<?php
$messages = [
    1 => "Les mots de passe entré ne sont pas identiques !",
    2 => "L'email rentré n'est pas valide !",
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
    <link rel="stylesheet" href="../styles/styles-register.css">
  </head>
  <body>
    <header class="header">
      <nav class="navbar">
        <div class="nav-brand">SAVEUR</div>
        <button class="nav-toggle" aria-label="toggle navigation">
          <span class="hamburger"></span>
        </button>
        <ul class="nav-menu">
          <li><a href="login.php" class="nav-link">Se connecter</a></li>
        </ul>
      </nav>
    </header>
      <section class="reservation" id="reservation">
        <div class="container">
            <div class="section-header">
                <h1>Créer un compte - Restaurant Saveur</h1>
                <h4>Veuillez remplir le formulaire ci-dessous</h4>
                <?php if (isset($erreur)) { ?>
                    </br>
                    <h4><?php echo htmlspecialchars($erreur); ?></h4>
                <?php } ?>
            </div>
            <form id="contact-form" class="contact-form" action="../controllers/register.php" method="post">
            <div class="form-group">
              <label for="lastname">Nom</label>
              <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
              <label for="firstname">Prénom</label>
              <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone</label>
                <input type="text" id="phone" min="10" max="12" name="phone" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="password">Mot de passe</label>
              <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
              <label for="confirmation">Confirmation du mot de passe</label>
              <input type="password" id="confirmation" name="confirmation" required>
            </div>
            <button type="submit" class="submit-btn">Envoyer</button>
          </form>
        </div>
      </section>
  </body>
</html>