<template>
    <app-layout>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter</button>
                <div class="dropdown-menu">
                    <div class="dropdown-item" @click="form.asset_type=null">All</div>
                    <div v-for="(asset_type, key) in asset_types" @click="form.asset_type=asset_type.value" :key="key" class="dropdown-item" >{{ asset_type.label }}</div>
                </div>
            </div>
            <input v-model="form.search" type="text" class="form-control" aria-label="Text input with dropdown button">
        </div>


        <inertia-link :href="route('asset-sets.create')"  class="btn btn-primary">
            New Set
        </inertia-link>
        <card  v-for="(asset_set, key) in asset_sets.data" :asset_set="asset_set" :key="key"></card>
        <pagination v-if="asset_sets.meta.total > 1" :links="asset_sets.meta.links"></pagination>
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
