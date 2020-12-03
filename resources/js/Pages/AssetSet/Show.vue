<template>
    <app-layout>
        <card :asset_set="asset_set"></card>

        <div class="card bg-white" style="margin-bottom: 20px">
            <div style="padding: 20px; padding-bottom: 0px">
                <div class="row">
                    <div class="col-auto">
                        <inertia-link :href="route('asset-sets.upload-items', asset_set.id)" class="btn btn-primary">Add new items</inertia-link>
                    </div>
                    <div class="col">

                        <div class="input-group mb-3">
                            <input v-model="form.search" placeholder="Search here...." type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body" >

                <div class="set-cards" style="margin-bottom: 20px;">
                    <item-card :key="key" v-for="(item, key) in items" :item="item"></item-card>
                </div>


<!--                <nav aria-label="Page navigation example">-->
<!--                    <pagination :links="asset_sets.links"></pagination>-->
<!--                </nav>-->
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../MakeSumo/AppLayout'
    import Button from "../../Jetstream/Button";
    import ItemCard from "../Items/Card";
    import mapValues from 'lodash/mapValues'
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
    import Pagination from "../../Shared/Pagination";
    import Card from "../AssetSet/Card";

    export default {
        components: {
            Card,
            Pagination,
            ItemCard,
            Button,
            AppLayout
        },
        props: {
            asset_set: Object,
            items: Array,
            search: String
        },

        data() {
            return {
                form: {
                    search: this.search,
                },
            }
        },

        watch: {
            form: {
                handler: throttle(function() {
                    let query = pickBy(this.form)
                    this.$inertia.replace(this.route('asset-sets.show', { asset_set: this.asset_set.id , search: this.form.search }))
                }, 150),
                deep: true,
            },
        },
    }
</script>
<style>
    .set-cards>.card:not(:first-child) {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
        border-top: 0px;
    }
    .set-cards>.card:not(:last-child) {
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
    }

    .color{
        width: 20px;
        height: 20px;
        margin-left: 4px;
        border-radius: 50%;
    }
</style>
