<template>
    <app-layout>
        <div class="card bg-white" style="margin-bottom: 20px">
            <div style="padding: 20px; padding-bottom: 0px">
                <div class="row">
                    <div class="col-auto">
                        <inertia-link :href="route('asset-sets.create')" class="btn btn-primary">Add new set</inertia-link>
                    </div>
                    <div class="col">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filters</button>
                                <div class="dropdown-menu">
                                    <a v-for="asse_type  in asset_types" :class="{active: form.asset_type == asse_type.value}" @click="form.asset_type = asse_type.value" class="dropdown-item " href="#">{{ asse_type.label }}</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" :class="{active:  form.trashed == 'with'}" @click="form.trashed = 'with'" href="#">With trashed</a>
                                    <a class="dropdown-item" :class="{active: form.trashed == 'only'}" @click="form.trashed = 'only'"  href="#">Only trashed</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" :class="{active: form.subscription == 'only_free'}" @click="form.subscription = 'only_free'"  href="#">Only free</a>
                                    <a class="dropdown-item" :class="{active: form.subscription == 'only_paid'}" @click="form.subscription = 'only_paid'"href="#">Only Paid</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" @click="reset" href="#">Reset filter</a>
                                </div>
                            </div>
                            <input v-model="form.search" placeholder="Search here...." type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body" >
                <div class="set-cards" style="margin-bottom: 20px;">
                    <card :show_link="true" :key="asset_set.id" v-for="asset_set in asset_sets.data" :asset_set="asset_set"/>
                </div>







                <nav aria-label="Page navigation example">
                    <pagination :links="asset_sets.links"></pagination>
                </nav>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../MakeSumo/AppLayout'
    import Button from "../../Jetstream/Button";
    import Card from "./Card";
    import mapValues from 'lodash/mapValues'
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
    import Pagination from "../../Shared/Pagination";

    export default {
        components: {
            Pagination,
            Card,
            Button,
            AppLayout
        },
       props: {
           asset_sets: Object,
           filters: Object,
           asset_types: Array,
       },
        data() {
            return {
                form: {
                    search: this.filters.search,
                    asset_type: this.filters.asset_type,
                    trashed: this.filters.trashed,
                    subscription: this.filters.subscription,
                },
            }
        },
        watch: {
            form: {
                handler: throttle(function() {
                    let query = pickBy(this.form)
                    this.$inertia.replace(this.route('asset-sets.index', Object.keys(query).length ? query : { remember: 'forget' }))
                }, 150),
                deep: true,
            },
        },
        methods: {
            reset() {
                this.form = mapValues(this.form, () => null)
            },
        },
    }
</script>
<style>
    /*.set-cards>.card:not(:last-child),*/
    .set-cards>.card:not(:first-child) {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top: 0px;
    }
    .set-cards>.card:not(:last-child) {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }
</style>
