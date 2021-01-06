<template>
    <div class="payment-button">

        <div class="card">

        </div>


        <div class="card-element">
            <input type="text" v-model="billingDetails.name" required>
        </div>

        <div class="card-element">
            <div id="card-element" class="form-control"></div>
            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>
        </div>

        <div class="stripe-errors"></div>

        <a target="_blank" href="https://stripe.com/docs/testing">Test card list
        </a>
        <button @click="confirmPaymentMethod" class="ms-card-btn">Make payment</button>
    </div>
</template>
<script>
    import Input from "../../Jetstream/Input";

    var style = {
        base: {
            color: '#303238',
            fontSize: '16px',
            fontFamily: '"Open Sans", sans-serif',
            fontSmoothing: 'antialiased',
            '::placeholder': {
                color: '#CFD7DF',
            },
        },
        invalid: {
            color: '#e5424d',
            ':focus': {
                color: '#303238',
            },
        },
    };

    export default {
        components: {Input},
        props: {
            productPriceId: {
              type: String,
              required: true,
            },
            paymentOthers: {
                type: Object,
                default: () => {}
            }
        },
        data() {
          return {
              payment: {
                  paymentMethodId: null,
                  productPriceId: this.productPriceId,
                  others: this.paymentOthers
              },
              card: null,
              stripe: null,
              intent: null,
              billingDetails: {
                    name: ''
              }
          }
        },
        mounted() {
            console.log('Mounting....')
            axios.get(route('subscription.intent'))
                .then(res => {
                    console.log(res)
                    this.intent = res.data.intent
                    this.billingDetails.name = this.$page.user.name
                    this.stripe = Stripe(MakeSumo.STRIPE_KEY)
                    var elements = this.stripe.elements();

                    this.card = elements.create('card', {hidePostalCode: true, style: style});
                    this.card.mount('#card-element');
                    this.card.addEventListener('change', function(event) {
                        var displayError = document.getElementById('card-errors');
                        if (event.error) {
                            displayError.textContent = event.error.message;
                        } else {
                            displayError.textContent = '';
                        }
                    });
                }).catch(err => {
                    console.log(err)
                })
        },
        methods: {
            async confirmPaymentMethod() {
                const { setupIntent, error } = await this.stripe.confirmCardSetup(
                    this.intent.client_secret, {
                        payment_method: {
                            card: this.card,
                            billing_details: this.billingDetails
                        }
                    }
                );
                if (error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                }
                this.payment.paymentMethodId = setupIntent.payment_method;

                this.makePayment();
            },

            makePayment () {
                this.$inertia.post(route('subscription.process'), this.payment)
            }

        }
    }
</script>
<style>
.text-left{
    text-align: center;
}
.card-element{
    border: 2px dashed #d0cccc;
    padding: 11px;
    margin-bottom: 10px;
}
input{
    width: 100%;
    border: 0;
    color: #999;
    font-size: 17px;
}
</style>

