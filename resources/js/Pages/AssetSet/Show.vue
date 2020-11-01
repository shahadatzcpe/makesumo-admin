<template>
    <app-layout>
        {{ asset_set }}
        {{ items }}
        {{ filters }}
        <div class="card">

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="asset-set-img" :style="{background: asset_set.bg_color }">
                            <img class="card-img-top" :src="asset_set.thumbnail_src" alt="Card image cap">
                        </div>
                        <div class="background-color">Background color:{{ asset_set.bg_color }}</div>
                        <div class="text-color">Text color: {{ asset_set.bg_color }}</div>
                        <div class="text-color">Total Assets: {{ asset_set.number_of_assets }}</div>
                    </div>
                    <div class="col-sm-8">
                        <h5 class="card-title">{{ asset_set.name }} - <span class="text-blue-gray">{{ asset_set.asset_type }}</span> </h5>
                        <div class="card-description">{{ asset_set.description }}</div>
                    </div>
                </div>
            </div>
            <hr>
            <input placeholder="Search here....">
            <div class="card-body" v-for="value in [1,2,4,4,5,5,6,6,6]" >

                    <div class="row">
                        <div class="col-sm-4">
                            <div class="asset-set-img" :style="{background: asset_set.bg_color }">
                                <img class="card-img-top" :src="asset_set.thumbnail_src" alt="Card image cap">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h5 class="card-title">{{ asset_set.name }}</h5>
                            <h5 class="card-title">{{ asset_set.name }}</h5>
                        </div>
                    </div>
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
           asset_set: Object,
           filters: Object,
           items: Array
       },
        data() {
            return {
                form: {
                    search: this.filters.search,
                    trashed: this.filters.trashed,
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
</style>
