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

                <button :disabled="sending" class="btn btn-primary" @click="submit(0)">Draft</button>
                <button :disabled="sending" class="btn btn-primary" @click="submit(1)">Publish</button>
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
           asset_set: Object,
           items: Array
       },
        data() {
            return {
                sending: false
            }
        },
        computed: {
            formattedData: function() {
                return this.items.map(function (item){
                        return {
                            id: item.id,
                            name: item.name,
                            tags: item.tags,
                            colours: item.colours.map( function(colour) {
                                return {
                                    id: colour.color_id,
                                    is_editable: colour.is_editable
                                }
                            })
                        }
                    })

            } //formatted data
        }, // computted
        methods: {
            submit(status) {
                var data = {
                    status: status ? 'published' : 'draft',
                    items: this.formattedData
                }
                this.$inertia.post(route('asset-sets.update-items', this.asset_set.id), data, {
                    onStart: () => this.sending = true,
                    onFinish: () => this.sending = false,
                    preserveScroll: true
                })
            }
        }
    }
</script>

