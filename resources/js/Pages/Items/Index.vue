<template>
    <app-layout>

        <div class="card bg-white" style="margin-bottom: 20px">
            <div style="padding: 20px; padding-bottom: 0px">
                <div class="row">
                    <div class="col-auto">
<!--                        <button class="btn btn-primary">Add new item</button>-->


                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filters</button>
                                <div class="dropdown-menu">
                                    <a v-for="asse_type  in asset_types" :class="{active: form.asset_type == asse_type.value}" @click="form.asset_type = asse_type.value" class="dropdown-item " href="#">{{ asse_type.label }}</a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item" :class="{active:  form.trashed == 'with_trashed'}" @click="form.trashed = 'with_trashed'" href="#">With trashed</a>
                                    <a class="dropdown-item" :class="{active: form.trashed == 'only_trashed'}" @click="form.trashed = 'only_trashed'"  href="#">Only trashed</a>
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
                    <div class="card" v-for="item in items.data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img :src="item.preview_src" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">{{ item.name }}</a> - <a href="#">{{ item.asset_set.name }}</a> - <small class="text-muted">{{ item.asset_set.asset_type }}</small> </h4>
                                    <div>
                                        <span>Pageviews:  {{ item.pageviews }}</span>,
                                        <span>Downloads: {{ item.downloads }} </span>,
                                        <span>Detected colors: {{ item.detected_colors_count }}</span>,
                                        <span>Editable colors: {{ item.editable_colors.length }} </span>
                                    </div>

                                    <div style="display: flex">Editable colors:
                                        <div v-for="color in item.editable_colors" class="color" :style="{ 'background-color': color }"></div>
                                    </div>
                                    <div>Tags:

                                        <a style="margin-right: 10px" @click="form.search=tag" v-for="tag in item.tags" href="#"><span class="label label-danger" >{{ tag }}</span></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <nav aria-label="Page navigation example">
                    <pagination :links="items.links"></pagination>
                </nav>
            </div>
        </div>



    </app-layout>
</template>

<script>
    import AppLayout from '../../MakeSumo/AppLayout'
    import Pagination from "../../Shared/Pagination";
    import pickBy from 'lodash/pickBy'
    import throttle from 'lodash/throttle'
    import mapValues from 'lodash/mapValues'

    export default {
        components: {
            Pagination,
            AppLayout
        },
        props: {
            items: Object,
            filters: Object,
            asset_types: Array,
        },
        data() {
            return {
                form: {
                    search: this.filters.search,
                    trashed: this.filters.trashed,
                    asset_type: this.filters.asset_type,
                    subscription: this.filters.subscription,
                },
            }
        },
        watch: {
            form: {
                handler: throttle(function() {
                    let query = pickBy(this.form)
                    this.$inertia.replace(this.route('items.index', Object.keys(query).length ? query : this.form))
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

    .color{
        width: 20px;
        height: 20px;
        margin-left: 4px;
        border-radius: 50%;
    }
</style>
