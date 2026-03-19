<?php
require_once 'includes/auth.php';
include 'includes/header.php';
?>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="step-box mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                <div>
                    <h2 class="mb-1">Pizza konfigurieren</h2>
                    <p class="text-muted mb-0">
                        Wählen Sie Ihre Pizza Schritt für Schritt aus und sehen Sie den Preis in Echtzeit.
                    </p>
                </div>
                <span class="badge bg-danger fs-6">4 Schritte</span>
            </div>

            <hr class="mb-4">

            <div class="mb-5">
                <label class="form-label fw-bold fs-4">Vorkonfigurierte Pizza</label>
                <p class="text-muted">
                    Wählen Sie eine Pizza als Vorlage und passen Sie sie anschließend an.
                </p>

                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card preset-card h-100" data-preset="margherita">
                            <img src="assets/images/margherita.png" class="card-img-top preset-img" alt="Margherita">
                            <div class="card-body text-center">
                                <h5 class="card-title">Margherita</h5>
                                <p class="card-text small text-muted">Klassisch mit Mozzarella und Tomaten</p>
                                <button type="button" class="btn btn-outline-danger w-100 preset-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card preset-card h-100" data-preset="salami">
                            <img src="assets/images/salami.png" class="card-img-top preset-img" alt="Salami Pizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Salami Pizza</h5>
                                <p class="card-text small text-muted">Beliebt und würzig</p>
                                <button type="button" class="btn btn-outline-danger w-100 preset-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card preset-card h-100" data-preset="veggie">
                            <img src="assets/images/veggie.png" class="card-img-top preset-img" alt="Vegetarische Pizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Vegetarisch</h5>
                                <p class="card-text small text-muted">Frisch mit Gemüse</p>
                                <button type="button" class="btn btn-outline-danger w-100 preset-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card preset-card h-100" data-preset="thunfisch">
                            <img src="assets/images/thunfisch.png" class="card-img-top preset-img" alt="Thunfisch Pizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Thunfisch</h5>
                                <p class="card-text small text-muted">Mit Thunfisch, Zwiebeln und Käse</p>
                                <button type="button" class="btn btn-outline-danger w-100 preset-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="mb-5">
                <h4 class="mb-3">Schritt 1: Größe wählen</h4>
                <p class="text-muted">Wählen Sie die gewünschte Pizzagröße aus.</p>

                <div class="row g-4">
                    <div class="col-md-6 col-xl-3">
                        <div class="card size-card h-100" data-size="Klein" data-price="6">
                            <img src="assets/images/size-klein.png" class="card-img-top size-img" alt="Kleine Pizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Klein</h5>
                                <p class="card-text small text-muted">Ideal für eine Person</p>
                                <div class="fw-bold text-danger mb-3">6,00 €</div>
                                <button type="button" class="btn btn-outline-danger w-100 size-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card size-card h-100" data-size="Mittel" data-price="8">
                            <img src="assets/images/size-mittel.png" class="card-img-top size-img" alt="Mittlere Pizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Mittel</h5>
                                <p class="card-text small text-muted">Die klassische Größe</p>
                                <div class="fw-bold text-danger mb-3">8,00 €</div>
                                <button type="button" class="btn btn-outline-danger w-100 size-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card size-card h-100" data-size="Groß" data-price="10">
                            <img src="assets/images/size-gross.png" class="card-img-top size-img" alt="Große Pizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Groß</h5>
                                <p class="card-text small text-muted">Mehr Genuss für mehr Hunger</p>
                                <div class="fw-bold text-danger mb-3">10,00 €</div>
                                <button type="button" class="btn btn-outline-danger w-100 size-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card size-card h-100" data-size="Familie" data-price="13">
                            <img src="assets/images/size-familie.png" class="card-img-top size-img" alt="Familienpizza">
                            <div class="card-body text-center">
                                <h5 class="card-title">Familie</h5>
                                <p class="card-text small text-muted">Perfekt zum Teilen</p>
                                <div class="fw-bold text-danger mb-3">13,00 €</div>
                                <button type="button" class="btn btn-outline-danger w-100 size-btn">Auswählen</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="mb-3">Schritt 2: Teig wählen</h4>
                <select id="dough" class="form-select form-select-lg">
                    <option value="">Bitte wählen</option>
                    <option value="Klassischer Teig" data-price="0">Klassischer Teig - 0 €</option>
                    <option value="Dünner Teig" data-price="1">Dünner Teig - 1 €</option>
                    <option value="Vollkornteig" data-price="1.5">Vollkornteig - 1,5 €</option>
                    <option value="Käse-Rand" data-price="2">Käse-Rand - 2 €</option>
                </select>
            </div>

            <div class="mb-4">
                <h4 class="mb-3">Schritt 3: Beläge wählen</h4>

                <div class="mb-3">
                    <input
                        type="text"
                        id="toppingSearch"
                        class="form-control form-control-lg"
                        placeholder="Beläge suchen..."
                    >
                </div>

                <div class="row" id="toppingsContainer"></div>
            </div>

            <div class="mb-4">
                <h4 class="mb-3">Schritt 4: Extras wählen</h4>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-check border rounded p-3 bg-light">
                            <input class="form-check-input extra-option" type="checkbox" value="Extra Käse" data-price="1" id="extra1">
                            <label class="form-check-label fw-semibold" for="extra1">Extra Käse (+1 €)</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check border rounded p-3 bg-light">
                            <input class="form-check-input extra-option" type="checkbox" value="Extra Soße" data-price="0.5" id="extra2">
                            <label class="form-check-label fw-semibold" for="extra2">Extra Soße (+0,5 €)</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check border rounded p-3 bg-light">
                            <input class="form-check-input extra-option" type="checkbox" value="Scharfe Soße" data-price="0.5" id="extra3">
                            <label class="form-check-label fw-semibold" for="extra3">Scharfe Soße (+0,5 €)</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-check border rounded p-3 bg-light">
                            <input class="form-check-input extra-option" type="checkbox" value="Knoblauchrand" data-price="1" id="extra4">
                            <label class="form-check-label fw-semibold" for="extra4">Knoblauchrand (+1 €)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <h4 class="mb-3">Gutscheincode</h4>
                <div class="input-group input-group-lg">
                    <input type="text" id="couponCode" class="form-control" placeholder="Gutscheincode eingeben">
                    <button class="btn btn-outline-success" type="button" id="applyCoupon">Code anwenden</button>
                </div>
                <small id="couponMessage" class="d-block mt-2"></small>
            </div>

            <form action="summary.php" method="POST" id="configForm">
                <input type="hidden" name="preset_name" id="hiddenPresetName">
                <input type="hidden" name="size" id="hiddenSize">
                <input type="hidden" name="dough" id="hiddenDough">
                <input type="hidden" name="toppings" id="hiddenToppings">
                <input type="hidden" name="extras" id="hiddenExtras">
                <input type="hidden" name="coupon_code" id="hiddenCouponCode">
                <input type="hidden" name="discount_percent" id="hiddenDiscountPercent">
                <input type="hidden" name="total_price" id="hiddenTotalPrice">

                <div class="d-grid">
                    <button type="submit" class="btn btn-danger btn-lg">
                        Zur Zusammenfassung
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="preview-box sticky-top" style="top: 20px;">
            <h4 class="mb-3">Ihre aktuelle Pizza</h4>

            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">Vorlage:</span>
                    <span id="previewPreset">-</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">Größe:</span>
                    <span id="previewSize">-</span>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="fw-semibold">Teig:</span>
                    <span id="previewDough">-</span>
                </div>
            </div>

            <div class="mb-3">
                <p class="fw-semibold mb-2">Beläge:</p>
                <div id="previewToppings"></div>
            </div>

            <div class="mb-3">
                <p class="fw-semibold mb-1">Extras:</p>
                <span id="previewExtras">-</span>
            </div>

            <div class="mb-3">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold">Rabatt:</span>
                    <span id="previewDiscount">0%</span>
                </div>
            </div>

            <hr>

            <p class="price-box text-center mb-0">
                Gesamtpreis: <span id="previewPrice">0.00</span> €
            </p>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>