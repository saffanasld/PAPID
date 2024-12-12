<?php
session_start();
include 'config.php';
$pdo = connexionDB();

$error_message = ""; 
$success_message = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = trim($_POST['login']);  
    $password = $_POST['password']; 

    $stmt = $pdo->prepare("SELECT * FROM Compte WHERE login = :login");
    $stmt->bindParam(':login', $login);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['type_compte'] = $user['type_compte'] ?? 'utilisateur'; 
            $_SESSION['id_compte'] = $user['login']; 
            $success_message = "Connexion réussie ! Bienvenue " . htmlspecialchars($user['login']) . ".";
        } else {
            $error_message = "Mot de passe incorrect.";
        }
    } else {
        $error_message = "Utilisateur introuvable.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Font+Climate+Crisis:wght@400&family=Gasoek+One:wght@400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Climate+Crisis&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css"> <!-- Ton fichier CSS -->
    <style>
        /* Centrer le formulaire */
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding-top: 50px;
        }

        /* Centrer les titres */
        .textformhconn, .textformco1 {
            text-align: center;
            color: white;
        }

        /* Style du formulaire */
        form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-label {
            color: #333;
        }

        .btn-primary {
            width: 100%;
        }

        /* Stylisation des liens sous le formulaire */
        .inputformco2-container {
            text-align: center;
            margin-top: 20px;
        }

        .inputformco {
            display: inline-block;
            margin: 10px;
            color: #007bff;
            cursor: pointer;
        }

        .inputformco1 {
            color: #555;
            display: inline-block;
            margin: 10px;
        }
    </style>
</head>
<body style="background-color: rgb(0, 0, 0);">
    <header>
        <div class="textformhconn">CONNEXION</div>
        <div class="textformco1">CONNECTE-TOI</div>
    </header>

    <div class="container">
        <h1 class="text-center text-white mb-4">Connexion</h1>

        <!-- Affichage des messages de succès ou erreur -->
        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <!-- Formulaire de connexion -->
        <form action="" method="POST">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" name="login" id="login" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>

        <!-- Liens supplémentaires sous le formulaire -->
        <div class="inputformco2-container">
            <a href="#"><div class="inputformco">MOT DE PASSE OUBLIE</div></a>
            <div class="inputformco1">OU</div>
            <a href="#"><div class="inputformco">S'INSCRIRE</div></a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





