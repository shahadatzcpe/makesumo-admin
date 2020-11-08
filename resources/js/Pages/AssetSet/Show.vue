<template>
    <app-layout>

        <div class="card" style="margin-bottom:15px">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                    </div>
                    <div class="col">
                        <div class="float-right">
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <a class="dropdown-item" href="#">Pending Item</a>
                                    <a class="dropdown-item" href="#">Publish</a>
                                </div>
                            </div>
                        </div>
                        <h4><a href="#">Spercial Shoe</a> -<small class="text-muted">Illustration</small> </h4>
                        <div>We carefully review new entries from our community one by one to make sure they meet high-quality design and functionality standards. From multipurpose themes to niche templates, you’ll always find something that catches your eye.</div>
                        <div>Background Color: #eee</div>
                        <div>Total Items: 1200</div>


                    </div>
                </div>
            </div>
        </div>


        <div class="card bg-white" style="margin-bottom: 20px">
            <div style="padding: 20px; padding-bottom: 0px">
                <div class="row">
                    <div class="col-auto">
                        <button class="btn btn-primary">Add new items</button>
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
                    <div class="card" v-for="item in items">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/150" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a></h4>
                                    <div>
                                        <span>Pageviews:  2011010</span>,
                                        <span>Downloads: 3030303 </span>,
                                        <span>Detected colors: 7 </span>,
                                        <span>Editable colors: 3 </span>,
                                    </div>
                                    <div style="display: flex">Editable colors:
                                        <div class="color" style="background-color: #333"></div>
                                        <div class="color" style="background-color: #737322"></div>
                                        <div class="color" style="background-color: #3629a3"></div>
                                        <div class="color" style="background-color: #3aa9a3"></div>
                                        <div class="color" style="background-color: #a72a3a"></div>
                                    </div>
                                    <div>Tags:


                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                        <a href=""><span class="label label-danger">Danger Label</span></a>
                                    </div>

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

        data() {
            return {

            items: [12,2,2,2,2,2,2,2,]

            }
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
