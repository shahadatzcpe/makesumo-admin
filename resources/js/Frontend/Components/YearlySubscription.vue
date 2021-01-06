<template>
    <div class="ms-overlay-section">
        <button @click="$emit('close')" class="ms-cross-btn"></button>
        <div class="ms-overlay-content ms-sm">
            <div class="ms-card ms-style3 text-left">
                <h2 class="ms-card-title">Get everything, unlimited</h2>
                <p class="ms-card-subtitle">$59 per year.</p>

                <payment-button :productPriceId="productPriceId"></payment-button>
            </div>
        </div>
    </div>
</template>
<script>
import PaymentButton from "./PaymentButton";
export default {
    components: {PaymentButton},
    data () {
        return {
            productPriceId: MakeSumo.packages.premium_package_price_yearly.price_id
        }
    }
}
</script>
