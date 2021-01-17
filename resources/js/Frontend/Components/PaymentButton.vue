<template>
    <div class="payment-button" :class="{loading: !loaded}">

        <div class="cards" v-if="cards.length">
            <div class="card" @click="payment.paymentMethodId = c.id" v-for="c in cards">
                <card-icon :brand="c.card.brand"/> **** **** {{ c.card.last4 }} {{ c.card.exp_month }}/{{ c.card.exp_year }}
                <span class="tick" v-if="c.id == payment.paymentMethodId">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 367.805 367.805" style="enable-background:new 0 0 367.805 367.805;" xml:space="preserve"><g><path style="fill:#3BB54A;" d="M183.903,0.001c101.566,0,183.902,82.336,183.902,183.902s-82.336,183.902-183.902,183.902
S0.001,285.469,0.001,183.903l0,0C-0.288,82.625,81.579,0.29,182.856,0.001C183.205,0,183.554,0,183.903,0.001z"/><polygon style="fill:#D4E1F4;" points="285.78,133.225 155.168,263.837 82.025,191.217 111.805,161.96 155.168,204.801
		256.001,103.968 	"/></g></svg>
                </span>
            </div>
            <div class="card" @click="payment.paymentMethodId=null">
                + Add new payment method
            </div>
        </div>

        <template v-if="payment.paymentMethodId == null">
            <div class="card-element">
                <input type="text" v-model="billingDetails.name" required>
            </div>

            <div class="card-element">
                <div id="card-element" class="form-control"></div>
                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>

            <div class="stripe-errors"></div>


        </template>

        <button @click="confirmPaymentMethod" class="ms-card-btn">Make payment</button>
    </div>
</template>
<script>
    import Input from "../../Jetstream/Input";
    import CardIcon from "../../Icons/CardIcon";

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
        components: {CardIcon, Input},
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
              loaded: false,
              payment: {
                  paymentMethodId: null,
                  productPriceId: this.productPriceId,
                  others: this.paymentOthers
              },
              card: null,
              cards: [],
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
                    this.loaded = true
                    this.intent = res.data.intent
                    this.cards = res.data.cards
                    this.payment.paymentMethodId = res.data.defaultPaymentMethod
                }).catch(err => {
                    console.log(err)
                })
        },
        methods: {
            showCardInputForm() {
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
            },


            async confirmPaymentMethod() {

                if(this.payment.paymentMethodId == null) {
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
                }
                this.makePayment();
            },

            makePayment () {
                this.$inertia.post(route('subscription.process'), this.payment,  {
                    onSuccess() {
                        location.reload()
                    }
                });
            }

        },
        watch: {
            'payment.paymentMethodId': function (value) {
                if(value == null) {
                    this.$nextTick(function() {
                        this.showCardInputForm();
                    })
                }
            }
        }
    }
</script>
<style scoped>
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
.card{
    width: 100%;
    cursor: pointer;
}
.tick{
    width: 20px;
    height: 20px;
    display: inline-block;
}
</style>

