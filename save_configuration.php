<?php
require_once 'includes/auth.php';
require_once 'db.php';

$userId = $_SESSION['user_id'];

$presetName = $_POST['preset_name'] ?? null;
$size = trim($_POST['size'] ?? '');
$dough = trim($_POST['dough'] ?? '');
$toppings = $_POST['toppings'] ?? '[]';
$extras = $_POST['extras'] ?? '[]';
$couponCode = trim($_POST['coupon_code'] ?? '');
$discountPercent = (float)($_POST['discount_percent'] ?? 0);
$totalPrice = (float)($_POST['total_price'] ?? 0);

$pizzaName = 'Meine individuelle Pizza';

switch ($presetName) {
    case 'margherita':
        $pizzaName = 'Margherita';
        break;
    case 'salami':
        $pizzaName = 'Salami Pizza';
        break;
    case 'veggie':
        $pizzaName = 'Vegetarische Pizza';
        break;
    case 'thunfisch':
        $pizzaName = 'Thunfisch Pizza';
        break;
}

if ($size === '' || $dough === '') {
    header("Location: configurator.php");
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO configurations
    (user_id, pizza_name, preset_name, size, dough, toppings, extras, coupon_code, discount_percent, total_price)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

$stmt->execute([
    $userId,
    $pizzaName,
    $presetName,
    $size,
    $dough,
    $toppings,
    $extras,
    $couponCode,
    $discountPercent,
    $totalPrice
]);

header("Location: my_configurations.php");
exit;
?>