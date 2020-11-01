<template>
    <app-layout>
        <div class="card" style="margin-bottom: 20px">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Asset type:</label>
                            <select class="form-control">
                                <option>Icons</option>
                                <option>Illustration</option>
                                <option>3d Illustration</option>
                                <option>Mockup</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email">Title:</label>
                            <input type="email" class="form-control" id="email">
                        </div>


                        <div class="form-group">
                            <label for="email">Asset description:</label>
                            <textarea type="email" class="form-control" rows="6"></textarea>
                        </div>




                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="email">Background color:</label>
                            <input type="color" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label for="email">Thumbnail:</label>
                            <input type="file" class="form-control" id="email">
                        </div>

                    </div>
                </div>

                <inertia-link class="btn btn-primary form-control" :href="route('asset-sets.upload-items', 1)" aria-label="Next">
                    <span >Next</span>
                    <span aria-hidden="true">&raquo;</span>
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
                sending: false
            }
        },
        methods: {
            submit() {
            }
        }
    }
</script>
