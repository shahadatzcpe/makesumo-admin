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
                    <editable :key="key" v-for="(item, key) in items" :item="item"></editable>
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
    import Editable from "../Items/Editable";

    export default {
        components: {
            Editable,
            ImageUpload,
            AppLayout
        },
       props: {
           items: Array
       },
        data() {
            return {
                sending: false
            }
        }
    }
</script>

