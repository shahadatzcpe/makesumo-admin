<template>
    <app-layout>
        <div class="card" style="margin-bottom: 20px">
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="asset_type">Asset type:</label>
                            <select id="asset_type" v-model="form.asset_type" class="form-control" :class="{ 'is-invalid': error('asset_type') }">
                                <option :key="key" :value="asset_type.value" v-for="(asset_type, key) in asset_types">{{ asset_type.label }}</option>
                            </select>
                            <div class="invalid-feedback">{{ error('asset_type') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" max="40" v-model="form.name" id="name" class="form-control" :class="{ 'is-invalid': error('name') }">
                            <div class="invalid-feedback">{{ error('name') }}</div>
                        </div>


                        <div class="form-group">
                            <label for="is_free_yes">Is free item?</label><br/>
                            <input :checked="form.is_free" type="radio" value="1" v-model="form.is_free" id="is_free_yes" :class="{ 'is-invalid': error('is_free') }">Yes <br/>
                            <input :checked="!form.is_free" type="radio" value="0" v-model="form.is_free" id="is_free_no" :class="{ 'is-invalid': error('is_free') }"> No
                            <div class="invalid-feedback">{{ error('description') }}</div>
                        </div>


                        <div class="form-group">
                            <label for="description">Asset description:</label>
                            <label>Available shortcode: [ASSET_NAME] [ASSET_GROUP_NAME] [EDITABLE_COLOUR_COUNT]</label>
                            <textarea id="description" v-model="form.description" class="form-control" rows="6" :class="{ 'is-invalid': error('description') }"></textarea>
                            <div class="invalid-feedback">{{ error('description') }}</div>
                        </div>




                    </div>
                    <div class="col-sm-6">

                        <div class="form-group">
                            <label for="bg_color">Background color:</label>
                            <input type="color" class="form-control" id="bg_color" v-model="form.bg_color" :class="{ 'is-invalid': error('bg_color') }">
                            <div class="invalid-feedback">{{ error('bg_color') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail:</label>
                            <div class="input-group mb-3">
                                <input ref="thumbnail" @input="pickThumbnail"  accept="image/*" id="thumbnail" type="file" class="form-control"  :class="{ 'is-invalid': error('thumbnail') }">
                                <div class="input-group-append">
                                    <button @click="removeThumbnail" class="btn btn-outline-secondary" type="button">Remove Image</button>
                                </div>

                                <div class="invalid-feedback">{{ error('thumbnail') }}</div>
                            </div>
                        </div>
                        <div class="image-preview" :style="{ 'background-color': form.bg_color }">
                            <img class="preview-image" v-if="previewImage" :src="previewImage">
                        </div>
                    </div>
                </div>

                <button :disabled="sending" class="btn btn-primary form-control" @click="submit" aria-label="Next">
                    <i v-if="sending" class="fa fa-circle-o-notch fa-spin"></i>
                    <span>{{ sending ? 'Submitting' : 'Next' }}</span>
                    <span aria-hidden="true">&raquo;</span>
                </button>
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
           asset_types: Array,
           asset_set: Object
       },

        data() {
            return {
                form: {
                    asset_type: this.asset_types[0].value,
                    name: null,
                    description: null,
                    bg_color: '#ffffff',
                    thumbnail: null,
                    is_free: 0,
                },
                sending: false,
                previewImage: null,
            }
        },
        mounted() {
                this.form.asset_type = this.asset_set.asset_type;
                this.form.name = this.asset_set.name;
                this.form.description =  this.asset_set.description;
                this.form.bg_color =  this.asset_set.bg_color;
                this.form.is_free =  this.asset_set.is_free;
                this.previewImage =  this.asset_set.thumbnail_src;

                console.log(this.form)
        },
        methods: {
            submit() {
                var data = new FormData()
                data.append('_method', 'PUT')
                data.append('asset_type', this.form.asset_type || '')
                data.append('bg_color', this.form.bg_color || '')
                data.append('name', this.form.name || '')
                data.append('description', this.form.description || '')
                if(this.form.thumbnail)
                data.append('thumbnail', this.form.thumbnail || '')
                data.append('is_free', this.form.is_free || 0)
                this.$inertia.post(route('asset-sets.update', this.asset_set.id), data, {
                    onStart: () => this.sending = true,
                    onFinish: () => this.sending = false,
                    preserveScroll: true
                })
            },
            pickThumbnail() {
                let input = this.$refs.thumbnail
                let file = input.files
                if (file && file[0]) {
                    let reader = new FileReader
                    reader.onload = e => {
                        this.previewImage = e.target.result
                    }
                    reader.readAsDataURL(file[0])
                    this.form.thumbnail = file[0]
                }
            },
            removeThumbnail() {
                this.previewImage = null
                this.form.thumbnail = null
                this.$refs.thumbnail.value = null
            }
        }
    }
</script>

<style>
    .image-preview{
        max-height: 200px;
        max-width: 200px;
        display: inline-block;
    }
    .preview-image{
        max-width: 100%;
    }
</style>
