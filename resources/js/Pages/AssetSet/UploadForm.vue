<template>
    <app-layout>


        <card :asset_set="asset_set"></card>

        <div class="card bg-white" style="margin-bottom: 20px">


            <div class="card-body" >

                <div class="drop-zones">
                    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
                </div>

                <br>

                <inertia-link class="btn btn-primary form-control" :href="route('asset-sets.pending-items', asset_set.id)" aria-label="Next">
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
    import Card from "./Card";

    export default {
        components: {
            Card,
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
                    maxFilesize: 3,
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
