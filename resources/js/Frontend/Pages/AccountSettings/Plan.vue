<template>
    <layout>

        <div class="ms-settings-subtitle-head">
            <h2 class="ms-settings-subtitle">Subscribed plan</h2>
        </div>
        <payment-button product-price-id="121212121sdks"></payment-button>

    </layout>
</template>

<script>
import Layout from "./Layout";
import PaymentButton from "../../Components/PaymentButton";

export default {
    components: {PaymentButton, Layout}
}
</script>
