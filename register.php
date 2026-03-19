<?php
session_start();
require_once 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $address = trim($_POST["address"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    if (!empty($name) && !empty($address) && !empty($email) && !empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            $stmt = $pdo->prepare("INSERT INTO users (name, address, email, password) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $address, $email, $hashedPassword]);
            $message = "Registrierung erfolgreich. Sie können sich jetzt anmelden.";
        } catch (PDOException $e) {
            $message = "Fehler: E-Mail existiert bereits oder Eingabe ist ungültig.";
        }
    } else {
        $message = "Bitte füllen Sie alle Felder aus.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="step-box">
            <h2 class="mb-4">Registrieren</h2>

            <?php if ($message): ?>
                <div class="alert alert-info"><?php echo $message; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Adresse</label>
                    <input type="text" name="address" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">E-Mail</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Passwort</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-success w-100">Konto erstellen</button>
            </form>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>