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
                                    <a class="dropdown-item" href="#">Icons</a>
                                    <a class="dropdown-item" href="#">Illustration</a>
                                    <a class="dropdown-item" href="#">3d Illustration</a>
                                    <a class="dropdown-item" href="#">Mockup</a>
                                    <div role="separator" class="dropdown-divider"></div>
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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                                    <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                                    <div>Background Color: #eee</div>
                                    <div>Total Items: 1200</div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                            <a class="page-link" href="" aria-label="Next">
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
