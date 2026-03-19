<?php
require_once 'includes/auth.php';

$presetName = $_POST['preset_name'] ?? '';
$size = $_POST['size'] ?? '';
$dough = $_POST['dough'] ?? '';
$toppings = json_decode($_POST['toppings'] ?? '[]', true);
$extras = json_decode($_POST['extras'] ?? '[]', true);
$couponCode = $_POST['coupon_code'] ?? '';
$discountPercent = $_POST['discount_percent'] ?? 0;
$totalPrice = $_POST['total_price'] ?? 0;

function getPresetDisplayName(string $presetName): string
{
    switch ($presetName) {
        case 'margherita':
            return 'Margherita';
        case 'salami':
            return 'Salami Pizza';
        case 'veggie':
            return 'Vegetarische Pizza';
        case 'thunfisch':
            return 'Thunfisch Pizza';
        default:
            return 'Individuelle Pizza';
    }
}

function getPresetImage(string $presetName): string
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

$presetDisplayName = getPresetDisplayName($presetName);
$presetImage = getPresetImage($presetName);

include 'includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="step-box">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                <div>
                    <h2 class="mb-1">Zusammenfassung Ihrer Konfiguration</h2>
                    <p class="text-muted mb-0">Bitte prüfen Sie Ihre Auswahl vor dem Speichern.</p>
                </div>
                <span class="badge bg-success fs-6">Fertig</span>
            </div>

            <div class="row g-4 align-items-center mb-4">
                <div class="col-md-4 text-center">
                    <img src="<?php echo htmlspecialchars($presetImage); ?>" alt="Pizza Bild" class="img-fluid summary-pizza-img">
                </div>

                <div class="col-md-8">
                    <div class="config-info-box">
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Vorlage:</span>
                            <span><?php echo htmlspecialchars($presetDisplayName); ?></span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Größe:</span>
                            <span><?php echo htmlspecialchars($size ?: '-'); ?></span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Teig:</span>
                            <span><?php echo htmlspecialchars($dough ?: '-'); ?></span>
                        </div>

                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Gutscheincode:</span>
                            <span><?php echo $couponCode ? htmlspecialchars($couponCode) : '-'; ?></span>
                        </div>

                        <div class="d-flex justify-content-between">
                            <span class="fw-semibold">Rabatt:</span>
                            <span><?php echo htmlspecialchars($discountPercent); ?>%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="mb-3">Beläge</h4>
                <?php if (!empty($toppings)): ?>
                    <div>
                        <?php foreach ($toppings as $topping): ?>
                            <span class="badge rounded-pill bg-success me-1 mb-2 px-3 py-2">
                                <?php echo htmlspecialchars($topping['name']); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted">Keine Beläge ausgewählt.</p>
                <?php endif; ?>
            </div>

            <div class="mb-4">
                <h4 class="mb-3">Extras</h4>
                <?php if (!empty($extras)): ?>
                    <div>
                        <?php foreach ($extras as $extra): ?>
                            <span class="badge rounded-pill bg-warning text-dark me-1 mb-2 px-3 py-2">
                                <?php echo htmlspecialchars($extra['name']); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted">Keine Extras ausgewählt.</p>
                <?php endif; ?>
            </div>

            <div class="border-top pt-4">
                <p class="price-box text-center mb-4">
                    Gesamtpreis: <?php echo htmlspecialchars(number_format((float)$totalPrice, 2)); ?> €
                </p>

                <div class="d-flex flex-wrap gap-2 justify-content-center">
                    <a href="configurator.php" class="btn btn-outline-secondary">
                        Zurück zum Konfigurator
                    </a>

                    <form action="save_configuration.php" method="POST" class="d-inline">
                        <input type="hidden" name="preset_name" value="<?php echo htmlspecialchars($presetName); ?>">
                        <input type="hidden" name="size" value="<?php echo htmlspecialchars($size); ?>">
                        <input type="hidden" name="dough" value="<?php echo htmlspecialchars($dough); ?>">
                        <input type="hidden" name="toppings" value='<?php echo htmlspecialchars(json_encode($toppings), ENT_QUOTES, "UTF-8"); ?>'>
                        <input type="hidden" name="extras" value='<?php echo htmlspecialchars(json_encode($extras), ENT_QUOTES, "UTF-8"); ?>'>
                        <input type="hidden" name="coupon_code" value="<?php echo htmlspecialchars($couponCode); ?>">
                        <input type="hidden" name="discount_percent" value="<?php echo htmlspecialchars($discountPercent); ?>">
                        <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($totalPrice); ?>">
                        <input type="hidden" name="order_mode" value="1">

                        <button type="submit" class="btn btn-danger">
                            Jetzt bestellen
                        </button>
                    </form>

                    <form action="save_configuration.php" method="POST" class="d-inline">
                        <input type="hidden" name="preset_name" value="<?php echo htmlspecialchars($presetName); ?>">
                        <input type="hidden" name="size" value="<?php echo htmlspecialchars($size); ?>">
                        <input type="hidden" name="dough" value="<?php echo htmlspecialchars($dough); ?>">
                        <input type="hidden" name="toppings" value='<?php echo htmlspecialchars(json_encode($toppings), ENT_QUOTES, "UTF-8"); ?>'>
                        <input type="hidden" name="extras" value='<?php echo htmlspecialchars(json_encode($extras), ENT_QUOTES, "UTF-8"); ?>'>
                        <input type="hidden" name="coupon_code" value="<?php echo htmlspecialchars($couponCode); ?>">
                        <input type="hidden" name="discount_percent" value="<?php echo htmlspecialchars($discountPercent); ?>">
                        <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($totalPrice); ?>">

                        <button type="submit" class="btn btn-success">
                            Konfiguration speichern
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>