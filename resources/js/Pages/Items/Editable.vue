<template>
    <div class="card" >
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <div class="assets">
                        <img :key="key"  v-for="(imagesUrl, key) in imagesUrls" :src="imagesUrl.generated_url" style="border-radius: 5px">
                    </div>
                </div>
                <div class="col">
                    <div class="float-right">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <inertia-link class="dropdown-item" :href="route('items.delete', item.id)">Delete</inertia-link>
                            </div>
                        </div>
                    </div>

                    <h4><input class="form-control" type="text" v-model="editableItem.name"></h4>
                    <div style="display: flex">Detected colors:
                        <div :key="key" v-for="(color, key) in editableItem.colors" class="color" :class="{is_not_editable: !color.is_editable, is_editable: color.is_editable}" :style="{'background-color': color.color_code}" @click="toggleEditable(color)"></div>
                    </div>

                    <div v-if="editablecolors.length" style="display: flex; margin-top: 20px">Editable colors:
                        <input  type="color" :key="key" v-for="(color, key) in editablecolors" class="editable-color" @input="generateImageUrl(color, $event)" :value="color.color_code"></input>
                    </div>



                    <tags v-model="item.tags"></tags>


                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AppLayout from '../../MakeSumo/AppLayout'
    import Tags from "../../Shared/Tags";

    export default {
        components: {
            Tags,
            AppLayout
        },
        props: {
          item: Object
        },
        data() {
            return {
                editableItem: this.item,
                imagesUrls: this.mapUrl(this.item.assets),
            }
        },
        computed: {
            editablecolors: function() {
                return this.editableItem.colors.filter((item) => item.is_editable)
            }
        },
        watch: {
            editablecolors: function() {
                this.generateImageUrl()
            }
        },
        methods: {
            toggleEditable(color) {
                color.is_editable = !color.is_editable
            },
            async  file_get_contents(uri, callback) {
                let res = await fetch(uri),
                    ret = await res.text();
                return callback ? callback(ret) : ret; // a Promise() actually.
            },
            mapUrl(assets) {
                var sanitizedAssets = [];
                for(var i= 0; i < assets.length; i++) {
                    if(!assets.hasOwnProperty(i)) continue;

                    sanitizedAssets[i] = {
                        'src': assets[i].src,
                        'original_content': '',
                        'generated_url': assets[i].src,
                        'asset_id': assets[i].asset_id,
                        'has_colors': assets[i].has_colors
                    }

                    if(assets[i].has_colors) {
                        this.file_get_contents(assets[i].src).then(function(a) {
                            this.original_content = a
                            var encodedData = window.btoa( this.original_content);
                            this.generated_url = 'data:image/svg+xml;base64,' + encodedData;
                        }.bind(sanitizedAssets[i]))
                    }
                }
                return sanitizedAssets;
            },
            generateImageUrl(color, $event) {
                if(!color) return;
                for(var i= 0; i < this.imagesUrls.length; i++) {
                    var imageUrl = this.imagesUrls[i];
                    if(color.asset_id === imageUrl.asset_id) {
                        imageUrl.original_content =  imageUrl.original_content.replaceAll(color.color_code, $event.target.value);
                        color.color_code = $event.target.value;
                        var encodedData = window.btoa(imageUrl.original_content);
                        imageUrl.generated_url = 'data:image/svg+xml;base64,' + encodedData;
                        break;
                    }
                }
            }

        }
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
        width: 30px;
        height: 30px;
        margin-left: 4px;
        border-radius: 50%;
    }
    .editable-color{

        border-radius: initial;
    }
    .assets{
        width: 200px;
        max-width: 200px;
        position: relative;
        height: 200px;
    }
    .assets img{
        max-width: 200px;
        position: absolute;
        max-height: 200px;
    }

    .is_editable{
        border: 4px solid green;
    }
    .is_not_editable{
        border: 4px solid red;
    }
</style>
