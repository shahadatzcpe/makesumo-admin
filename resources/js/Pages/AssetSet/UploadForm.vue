<template>
    <app-layout>

        <div class="card" style="margin-bottom:15px">
            <div class="card-body">
                <div class="row">
                    <div class="col-auto">
                        <div :style="{ 'background-color': asset_set.bg_color }"><img :src="asset_set.thumbnail_src" style="border-radius: 5px; max-width: 200px"></div>
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
                        <h4>{{ asset_set.name }} - <small class="text-muted">{{ asset_set.asset_type }}</small> </h4>
                        <div>{{ asset_set.description }}</div>
                        <div>Background Color: {{ asset_set.bg_color }}</div>
                        <div>Total Items: {{ asset_set.total_items }}</div>


                    </div>
                </div>
            </div>
        </div>


        <div class="card bg-white" style="margin-bottom: 20px">


            <div class="card-body" >

                <div class="drop-zones">
                    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                </div>

                <br>

                <inertia-link class="btn btn-primary form-control" :href="route('asset-sets.pending-items', 1)" aria-label="Next">
                    <span >Next</span>
                    <span aria-hidden="true">&raquo;</span>
                </inertia-link>

            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from './../../MakeSumo/AppLayout'
    import vue2Dropzone from 'vue2-dropzone'
    import 'vue2-dropzone/dist/vue2Dropzone.min.css'

    export default {
        components: {
            vueDropzone: vue2Dropzone,
            AppLayout
        },
       props: {
           asset_set: Object
       },
        data: function () {
            return {
                dropzoneOptions: {
                    url: route('asset-sets.upload-item', this.asset_set.id),
                    thumbnailWidth: 150,
                    thumbnailHeight: 150,
                    maxFilesize: 0.2,
                    headers: { "X-CSRF-TOKEN": document.head.querySelector('meta[name="csrf-token"]').content }
                }
            }
        }
    }
</script>
<style>
    .dz-image img{
        max-width: 150px;
        max-height: 150px;
    }
</style>
