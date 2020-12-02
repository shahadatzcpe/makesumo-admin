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
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filters</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">With trashed</a>
                                    <a class="dropdown-item" href="#">Only trashed</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Only free</a>
                                    <a class="dropdown-item" href="#">Only Paid</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Reset filter</a>
                                </div>
                            </div>
                            <input placeholder="Search here...." type="text" class="form-control" aria-label="Text input with dropdown button">
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body" >

                <div class="set-cards" style="margin-bottom: 20px;">
                    <item-card :key="key" v-for="(item, key) in items" :item="item"></item-card>
                </div>







                <nav aria-label="Page navigation example">
                    <ul class="pagination" style="margin-bottom: 0px">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
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
        }
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
