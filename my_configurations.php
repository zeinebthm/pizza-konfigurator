<?php
require_once 'includes/auth.php';
require_once 'db.php';

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM configurations WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$userId]);
$configurations = $stmt->fetchAll(PDO::FETCH_ASSOC);

function getPizzaImageByPreset(?string $presetName): string
{
    switch ($presetName) {
        case 'salami':
            return 'assets/images/salami.png';
        case 'veggie':
            return 'assets/images/veggie.png';
        case 'thunfisch':
            return 'assets/images/thunfisch.png';
        case 'margherita':
        default:
            return 'assets/images/margherita.png';
    }
}

function getPizzaDisplayName(array $config): string
{
    if (!empty($config['pizza_name']) && $config['pizza_name'] !== 'Meine Pizza') {
        return $config['pizza_name'];
    }

    switch ($config['preset_name'] ?? '') {
        case 'margherita':
            return 'Margherita';
        case 'salami':
            return 'Salami Pizza';
        case 'veggie':
            return 'Vegetarische Pizza';
        case 'thunfisch':
            return 'Thunfisch Pizza';
        default:
            return 'Meine individuelle Pizza';
    }
}

include 'includes/header.php';
?>

<div class="my-config-header mb-4">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="mb-1">Meine gespeicherten Konfigurationen</h2>
            <p class="text-muted mb-0">
                Hier finden Sie alle gespeicherten Pizza-Konfigurationen.
            </p>
        </div>
        <a href="configurator.php" class="btn btn-danger">Neue Pizza konfigurieren</a>
    </div>
</div>

<?php if (empty($configurations)): ?>
    <div class="empty-config-box text-center">
        <img src="assets/images/margherita.png" alt="Pizza" class="empty-config-img mb-3">
        <h4>Noch keine Konfigurationen gespeichert</h4>
        <p class="text-muted">
            Sie haben noch keine Pizza gespeichert. Erstellen Sie jetzt Ihre erste Konfiguration.
        </p>
        <a href="configurator.php" class="btn btn-danger">Zum Konfigurator</a>
    </div>
<?php else: ?>
    <div class="row g-4">
        <?php foreach ($configurations as $config): ?>
            <?php
                $toppings = json_decode($config['toppings'], true) ?: [];
                $extras = json_decode($config['extras'], true) ?: [];
                $imagePath = getPizzaImageByPreset($config['preset_name'] ?? null);
                $displayName = getPizzaDisplayName($config);
                $formattedDate = date('d.m.Y H:i', strtotime($config['created_at']));
            ?>

            <div class="col-md-6 col-xl-4">
                <div class="card config-card h-100">
                    <div class="config-image-wrapper">
                        <img src="<?php echo htmlspecialchars($imagePath); ?>" class="config-card-img" alt="Pizza Bild">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start mb-2 gap-2">
                            <h5 class="card-title mb-0">
                                <?php echo htmlspecialchars($displayName); ?>
                            </h5>
                            <span class="badge bg-danger fs-6">
                                <?php echo htmlspecialchars(number_format((float)$config['total_price'], 2)); ?> €
                            </span>
                        </div>

                        <p class="text-muted small mb-3">
                            Gespeichert am <?php echo htmlspecialchars($formattedDate); ?>
                        </p>

                        <div class="config-info-box mb-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">Vorlage:</span>
                                <span>
                                    <?php echo !empty($config['preset_name']) ? htmlspecialchars($config['preset_name']) : '-'; ?>
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">Größe:</span>
                                <span><?php echo htmlspecialchars($config['size']); ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-2">
                                <span class="fw-semibold">Teig:</span>
                                <span><?php echo htmlspecialchars($config['dough']); ?></span>
                            </div>

                            <div class="d-flex justify-content-between mb-0">
                                <span class="fw-semibold">Rabattcode:</span>
                                <span>
                                    <?php echo !empty($config['coupon_code']) ? htmlspecialchars($config['coupon_code']) : '-'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="fw-semibold mb-2">Beläge</p>

                            <?php if (!empty($toppings)): ?>
                                <div>
                                    <?php foreach ($toppings as $item): ?>
                                        <span class="badge rounded-pill bg-success me-1 mb-1 px-3 py-2">
                                            <?php echo htmlspecialchars($item['name']); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted mb-0">Keine Beläge ausgewählt</p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <p class="fw-semibold mb-2">Extras</p>

                            <?php if (!empty($extras)): ?>
                                <div>
                                    <?php foreach ($extras as $extra): ?>
                                        <span class="badge rounded-pill bg-warning text-dark me-1 mb-1 px-3 py-2">
                                            <?php echo htmlspecialchars($extra['name']); ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-muted mb-0">Keine Extras</p>
                            <?php endif; ?>
                        </div>

                        <div class="mt-auto pt-3 border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Gesamtpreis</span>
                                <span class="config-price">
                                    <?php echo htmlspecialchars(number_format((float)$config['total_price'], 2)); ?> €
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>