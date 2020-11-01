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


            <div class="card-body" >

                <div class="set-cards" style="margin-bottom: 20px;">
                    <div class="card" v-for="item in items">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-auto">
                                    <a href="#"><img src="https://picsum.photos/350" style="border-radius: 5px"></a>
                                </div>
                                <div class="col">
                                    <h4><a href="#">Spercial Shoe</a></h4>
                                    <div style="display: flex">Detected colours:
                                        <div class="color" style="background-color: #333"></div>
                                        <div class="color" style="background-color: #737322"></div>
                                        <div class="color" style="background-color: #3629a3"></div>
                                        <div class="color" style="background-color: #3aa9a3"></div>
                                        <div class="color" style="background-color: #a72a3a"></div>
                                    </div>
                                    <br>
                                    <div style="display: flex">Editable colours:
                                        <div class="color" style="background-color: #333"></div>
                                        <div class="color" style="background-color: #737322"></div>
                                        <div class="color" style="background-color: #3629a3"></div>
                                        <div class="color" style="background-color: #3aa9a3"></div>
                                        <div class="color" style="background-color: #a72a3a"></div>
                                    </div>

                                    <br>
                                    <input placeholder="Type your tag here...." type="text" class="form-control" aria-label="Text input with dropdown button">

                                    <div>Tags:

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>







                <button class="btn btn-primary">Select All</button>


                <inertia-link class="btn btn-primary" :href="route('asset-sets.show', 1)" aria-label="Next">
                    Publish selected item
                </inertia-link>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import ImageUpload from "./../../Shared/ImageUpload";
    import AppLayout from './../../MakeSumo/AppLayout'

    export default {
        components: {
            ImageUpload,
            AppLayout
        },
       props: {
       },
        data() {
            return {
                sending: false,
                items: [12,2,2,2,2,2,2,2,2,2,2,2]
            }
        },
        methods: {
            submit() {
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
        width: 30px;
        height: 30px;
        margin-left: 4px;
        border-radius: 50%;
    }
</style>
