document.addEventListener("DOMContentLoaded", function () {
    const toppingsData = [
        { name: "Mozzarella", price: 0.8 },
        { name: "Cheddar", price: 0.8 },
        { name: "Parmesan", price: 1.2 },
        { name: "Schinken", price: 0.8 },
        { name: "Salami", price: 0.8 },
        { name: "Hähnchen", price: 1.5 },
        { name: "Thunfisch", price: 1.5 },
        { name: "Hackfleisch", price: 1.2 },
        { name: "Zwiebeln", price: 0.8 },
        { name: "Paprika", price: 0.8 },
        { name: "Tomaten", price: 0.8 },
        { name: "Oliven", price: 0.8 },
        { name: "Mais", price: 0.8 },
        { name: "Champignons", price: 0.8 },
        { name: "Spinat", price: 0.8 },
        { name: "Rucola", price: 0.8 },
        { name: "Peperoni", price: 0.8 },
        { name: "Ananas", price: 0.8 },
        { name: "Feta", price: 1.0 },
        { name: "Brokkoli", price: 0.8 },
        { name: "Jalapeños", price: 0.8 },
        { name: "Knoblauch", price: 0.5 }
    ];

    const toppingsContainer = document.getElementById("toppingsContainer");
    const toppingSearch = document.getElementById("toppingSearch");
    const doughSelect = document.getElementById("dough");
    const extraOptions = document.querySelectorAll(".extra-option");
    const applyCouponBtn = document.getElementById("applyCoupon");
    const couponCodeInput = document.getElementById("couponCode");
    const couponMessage = document.getElementById("couponMessage");
    const presetCards = document.querySelectorAll(".preset-card");
    const sizeCards = document.querySelectorAll(".size-card");
    const configForm = document.getElementById("configForm");

    let discountPercent = 0;
    let selectedPresetName = "";
    let selectedSize = "";
    let selectedSizePrice = 0;

    if (!toppingsContainer || !doughSelect || !configForm) {
        return;
    }

    renderToppings(toppingsData);

    if (toppingSearch) {
        toppingSearch.addEventListener("input", function () {
            const value = this.value.toLowerCase().trim();
            const filtered = toppingsData.filter(topping =>
                topping.name.toLowerCase().includes(value)
            );
            renderToppings(filtered);
        });
    }

    doughSelect.addEventListener("change", updatePreview);

    extraOptions.forEach(option => {
        option.addEventListener("change", updatePreview);
    });

    if (applyCouponBtn) {
        applyCouponBtn.addEventListener("click", applyCoupon);
    }

    presetCards.forEach(card => {
        card.addEventListener("click", function () {
            const preset = this.dataset.preset;

            clearSelections(false);
            presetCards.forEach(c => c.classList.remove("active"));
            this.classList.add("active");

            selectedPresetName = preset;
            applyPreset(preset);
        });
    });

    sizeCards.forEach(card => {
        card.addEventListener("click", function () {
            sizeCards.forEach(c => c.classList.remove("active"));
            this.classList.add("active");

            selectedSize = this.dataset.size;
            selectedSizePrice = parseFloat(this.dataset.price || 0);

            updatePreview();
        });
    });

    configForm.addEventListener("submit", function () {
        const selectedToppings = getSelectedToppings();
        const selectedExtras = getSelectedExtras();
        const totalPrice = calculateTotal();

        document.getElementById("hiddenPresetName").value = selectedPresetName;
        document.getElementById("hiddenSize").value = selectedSize;
        document.getElementById("hiddenDough").value = doughSelect.value;
        document.getElementById("hiddenToppings").value = JSON.stringify(selectedToppings);
        document.getElementById("hiddenExtras").value = JSON.stringify(selectedExtras);
        document.getElementById("hiddenCouponCode").value = couponCodeInput ? couponCodeInput.value.trim() : "";
        document.getElementById("hiddenDiscountPercent").value = discountPercent;
        document.getElementById("hiddenTotalPrice").value = totalPrice.toFixed(2);
    });

    updatePreview();

    function renderToppings(list) {
        toppingsContainer.innerHTML = "";

        list.forEach((topping, index) => {
            const safeName = topping.name.replace(/\s+/g, "_").replace(/[^\w-]/g, "");
            const id = `topping_${index}_${safeName}`;

            toppingsContainer.innerHTML += `
                <div class="col-md-6 mb-2 topping-item">
                    <div class="form-check border rounded p-2 bg-white">
                        <input
                            class="form-check-input topping-option"
                            type="checkbox"
                            value="${topping.name}"
                            data-price="${topping.price}"
                            id="${id}"
                        >
                        <label class="form-check-label" for="${id}">
                            ${topping.name} (+${topping.price.toFixed(2)} €)
                        </label>
                    </div>
                </div>
            `;
        });

        document.querySelectorAll(".topping-option").forEach(option => {
            option.addEventListener("change", updatePreview);
        });
    }

    function getSelectedToppings() {
        return Array.from(document.querySelectorAll(".topping-option:checked")).map(option => ({
            name: option.value,
            price: parseFloat(option.dataset.price)
        }));
    }

    function getSelectedExtras() {
        return Array.from(document.querySelectorAll(".extra-option:checked")).map(option => ({
            name: option.value,
            price: parseFloat(option.dataset.price)
        }));
    }

    function calculateTotal() {
        let total = 0;

        if (selectedSize) {
            total += selectedSizePrice;
        }

        if (doughSelect.value) {
            total += parseFloat(doughSelect.selectedOptions[0].dataset.price || 0);
        }

        getSelectedToppings().forEach(item => {
            total += item.price;
        });

        getSelectedExtras().forEach(item => {
            total += item.price;
        });

        if (discountPercent > 0) {
            total = total - (total * discountPercent / 100);
        }

        return total;
    }

    function updatePreview() {
        const selectedToppings = getSelectedToppings();
        const selectedExtras = getSelectedExtras();
        const total = calculateTotal();

        const previewPreset = document.getElementById("previewPreset");
        const previewSize = document.getElementById("previewSize");
        const previewDough = document.getElementById("previewDough");
        const previewToppings = document.getElementById("previewToppings");
        const previewExtras = document.getElementById("previewExtras");
        const previewDiscount = document.getElementById("previewDiscount");
        const previewPrice = document.getElementById("previewPrice");

        if (previewPreset) {
            previewPreset.textContent = getPresetLabel(selectedPresetName);
        }

        if (previewSize) {
            previewSize.textContent = selectedSize || "-";
        }

        if (previewDough) {
            previewDough.textContent = doughSelect.value || "-";
        }

        if (previewToppings) {
            previewToppings.innerHTML = "";

            if (selectedToppings.length === 0) {
                previewToppings.innerHTML = "<span>-</span>";
            } else {
                selectedToppings.forEach(item => {
                    previewToppings.innerHTML += `
                        <span class="badge bg-success badge-topping">${item.name}</span>
                    `;
                });
            }
        }

        if (previewExtras) {
            previewExtras.textContent = selectedExtras.length > 0
                ? selectedExtras.map(extra => extra.name).join(", ")
                : "-";
        }

        if (previewDiscount) {
            previewDiscount.textContent = discountPercent + "%";
        }

        if (previewPrice) {
            previewPrice.textContent = total.toFixed(2);
        }
    }

    function applyCoupon() {
        if (!couponCodeInput || !couponMessage) return;

        const code = couponCodeInput.value.trim().toUpperCase();

        if (code === "PIZZA10") {
            discountPercent = 10;
            couponMessage.textContent = "Rabatt erfolgreich angewendet: 10%";
            couponMessage.className = "text-success d-block mt-2";
        } else if (code === "STUDENT5") {
            discountPercent = 5;
            couponMessage.textContent = "Rabatt erfolgreich angewendet: 5%";
            couponMessage.className = "text-success d-block mt-2";
        } else if (code === "") {
            discountPercent = 0;
            couponMessage.textContent = "Bitte geben Sie einen Code ein.";
            couponMessage.className = "text-warning d-block mt-2";
        } else {
            discountPercent = 0;
            couponMessage.textContent = "Ungültiger Gutscheincode.";
            couponMessage.className = "text-danger d-block mt-2";
        }

        updatePreview();
    }

    function applyPreset(presetName) {
        switch (presetName) {
            case "margherita":
                selectSize("Mittel");
                doughSelect.value = "Klassischer Teig";
                checkTopping("Mozzarella");
                checkTopping("Tomaten");
                break;

            case "salami":
                selectSize("Groß");
                doughSelect.value = "Dünner Teig";
                checkTopping("Mozzarella");
                checkTopping("Salami");
                break;

            case "veggie":
                selectSize("Mittel");
                doughSelect.value = "Vollkornteig";
                checkTopping("Paprika");
                checkTopping("Oliven");
                checkTopping("Champignons");
                checkTopping("Mais");
                break;

            case "thunfisch":
                selectSize("Groß");
                doughSelect.value = "Klassischer Teig";
                checkTopping("Thunfisch");
                checkTopping("Zwiebeln");
                checkTopping("Mozzarella");
                break;
        }

        updatePreview();
    }

    function selectSize(sizeName) {
        sizeCards.forEach(card => {
            if (card.dataset.size === sizeName) {
                card.classList.add("active");
                selectedSize = card.dataset.size;
                selectedSizePrice = parseFloat(card.dataset.price || 0);
            } else {
                card.classList.remove("active");
            }
        });
    }

    function clearSelections(removeActiveCard = true) {
        selectedSize = "";
        selectedSizePrice = 0;
        doughSelect.value = "";

        if (couponCodeInput) {
            couponCodeInput.value = "";
        }

        discountPercent = 0;
        selectedPresetName = "";

        if (couponMessage) {
            couponMessage.textContent = "";
            couponMessage.className = "d-block mt-2";
        }

        document.querySelectorAll(".topping-option").forEach(option => {
            option.checked = false;
        });

        document.querySelectorAll(".extra-option").forEach(option => {
            option.checked = false;
        });

        sizeCards.forEach(card => card.classList.remove("active"));

        if (removeActiveCard) {
            presetCards.forEach(card => card.classList.remove("active"));
        }
    }

    function checkTopping(name) {
        document.querySelectorAll(".topping-option").forEach(option => {
            if (option.value === name) {
                option.checked = true;
            }
        });
    }

    function getPresetLabel(presetName) {
        switch (presetName) {
            case "margherita":
                return "Margherita";
            case "salami":
                return "Salami Pizza";
            case "veggie":
                return "Vegetarische Pizza";
            case "thunfisch":
                return "Thunfisch Pizza";
            default:
                return "-";
        }
    }
});