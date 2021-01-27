<template>
    <div class="payment-button" :class="{loading: !loaded}">
        <div class="ms-method-items" v-if="cards.length">
            <div class="ms-method-item"  v-for="c in cards">
                <div class="ms-method-in">
                    <div class="ms-method-check" @click="payment.paymentMethodId = c.id">
                        <input type="radio" name="card" :checked="payment.paymentMethodId == c.id" >
                        <span></span>
                    </div>
                    <div class="ms-method-icon">
                        <card-icon brand="visa"></card-icon>
                    </div>
                    <div class="ms-method-info">
                        <div class="ms-method-title">{{ c.card.brand | capitalize }} <span>****</span> {{ c.card.last4 }}</div>
                        <div class="ms-method-expire">Exp: {{ c.card.exp_month > 9 ?  c.card.exp_month : '0'  + c.card.exp_month  }}/{{ c.card.exp_year }}</div>
                    </div>
                </div>
                <div class="ms-method-btns" v-if="!c.is_default">
                    <button v-if="!processingMessage" class="ms-add-btn" @click="updateDefaultPaymentMethod(c.id)">Make Default</button>
                    <button v-if="!processingMessage" class="ms-delete-btn" @click="deletePaymentMethod(c.id)">Delete</button>
                </div>
            </div>
            <div class="ms-new-card-btn"  v-if="payment.paymentMethodId !== null">
                <button class="ms-add-new-btn" @click="addNewCard"><span>+</span>Add New Card</button>
            </div>
        </div>

        <template v-if="payment.paymentMethodId == null">

            <div style="height: 15px;"></div>
            <div class="ms-input-wrap">
                <input type="text" v-model="billingDetails.name" placeholder="Name on the card.." required>
            </div>

            <div style="height: 15px;"></div>
            <div class="ms-input-wrap">
                <div id="card-element" ></div>
            </div>

            <div id="card-errors" role="alert"></div>

            <div class="stripe-errors"></div>

        </template>

        <div style="height: 15px;"></div>
        <button @click="confirmPaymentMethod" class="ms-card-btn" v-if="!processingMessage">
            Pay now
        </button>
        <h2 v-else>{{ processingMessage }}</h2>
    </div>
</template>
<script>
    import Input from "../../Jetstream/Input";
    import CardIcon from "../../Icons/CardIcon";
    import axios  from 'axios';
    import toastr from 'toastr';

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
              processingMessage: '',
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
                    this.showCardInputForm();
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
                    this.processingMessage = 'Adding payment method';
                    const { setupIntent, error } = await this.stripe.confirmCardSetup(
                        this.intent.client_secret, {
                            payment_method: {
                                card: this.card,
                                billing_details: this.billingDetails
                            }
                        }
                    );
                    this.processingMessage = '';
                    if (error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = error.message;
                        return;
                    }
                    this.payment.paymentMethodId = setupIntent.payment_method;
                }
                this.makePayment();
            },

            makePayment () {
                this.processingMessage = 'Processing payment';
                this.$inertia.post(route('subscription.process'), this.payment,  {
                    onSuccess() {
                        location.reload()
                    }
                });
            },

            addNewCard () {
                this.payment.paymentMethodId = null
                this.$nextTick(function() {
                    this.showCardInputForm();
                })
            },

            updateDefaultPaymentMethod (id) {

                this.processingMessage = 'Updating default payment method.';
                axios.post(
                    route('subscription.update-detault-payment-method'),
                    {payment_method: id}
                )
                .then((response) => {
                    for(var i = 0; i < this.cards.length; i++) {
                        this.cards[i].is_default = id === this.cards[i].id
                    }

                    this.processingMessage = '';
                    toastr.success('Default payment method successfully changed')
                });
            },

            deletePaymentMethod (id) {
                this.processingMessage = 'Deleting payment method.';
                axios.post(route(
                    'subscription.delete-payment-method'),
                    {payment_method: id, '_method': 'delete'},
                ).then((response) => {
                    var cards = [];
                    for(var i = 0; i < this.cards.length; i++) {
                       if(id === this.cards[i].id) {
                           var a = this.cards.splice(i, 1);

                           if(this.payment.paymentMethodId === id) {
                               this.payment.paymentMethodId = null
                           }
                       } else {
                           cards.push(this.cards[i])
                       }
                        this.processingMessage = ''
                        toastr.success('Payment method successfully deleted')
                        this.cards = cards;
                        if(this.cards.length == 0) {
                            this.addNewCard();
                        }
                    }
                });
            }

        },
        filters: {
            capitalize: function (value) {
                if (!value) return ''
                value = value.toString()
                return value.charAt(0).toUpperCase() + value.slice(1)
            }
        }

    }
</script>
<style scoped>

input{
    width: 100%;
    border: 0;
    color: #999;
    font-size: 16px;
    line-height: 16px;
}
</style>

