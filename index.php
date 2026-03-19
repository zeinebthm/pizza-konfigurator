<?php include 'includes/header.php'; ?>

<div class="hero-section text-center">
    <h1 class="display-5 fw-bold">Willkommen bei unserem Pizza-Konfigurator</h1>
    <p class="lead mt-3">
        Stellen Sie Ihre Pizza Schritt für Schritt zusammen und speichern Sie Ihre Lieblingskonfiguration ganz einfach online.
    </p>
    <div class="mt-4">
        <a href="configurator.php" class="btn btn-light btn-lg me-2">Jetzt konfigurieren</a>
        <a href="register.php" class="btn btn-outline-light btn-lg">Registrieren</a>
    </div>
</div>

<div class="row mt-5 g-4">
    <div class="col-md-4">
        <div class="card h-100 index-feature-card">
            <div class="card-body">
                <h4>1. Einfach wählen</h4>
                <p>Wählen Sie Größe, Teig, Beläge und Extras in wenigen Schritten aus.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 index-feature-card">
            <div class="card-body">
                <h4>2. Preis sofort sehen</h4>
                <p>Der Gesamtpreis wird automatisch und sofort aktualisiert.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card h-100 index-feature-card">
            <div class="card-body">
                <h4>3. Online speichern</h4>
                <p>Als eingeloggter Benutzer können Sie Ihre Konfiguration in der Datenbank speichern.</p>
            </div>
        </div>
    </div>
</div>

<div class="custom-pizza-section mt-5">
    <div class="row align-items-center g-4">
        <div class="col-lg-6">
            <div class="custom-pizza-text">
                <span class="badge bg-danger mb-3">Neu</span>
                <h2 class="mb-3">Ihre eigene Pizza konfigurieren</h2>
                <p class="text-muted mb-4">
                    Wählen Sie Ihre Lieblingsgröße, den passenden Teig, leckere Beläge und zusätzliche Extras.
                    Erstellen Sie Ihre ganz persönliche Pizza und speichern Sie Ihre Konfiguration bequem online.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="configurator.php" class="btn btn-danger btn-lg">Jetzt starten</a>
                    <a href="my_configurations.php" class="btn btn-outline-dark btn-lg">Meine Konfigurationen</a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 text-center">
            <div class="custom-pizza-image-box">
                <img src="assets/images/margherita.png" alt="Pizza" class="img-fluid home-pizza-img">
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?> 