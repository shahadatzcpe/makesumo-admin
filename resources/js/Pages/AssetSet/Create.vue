<template>
    <app-layout>
        <div class="yoo-card yoo-style1">
            <div class="yoo-card-heading">
                <div class="yoo-card-heading-left">
                    <h2 class="yoo-card-name">Create New Set</h2>
                </div>
                <div class="yoo-card-heading-right">
                    <!-- Code Modal -->
                    <div class="modal fade" id="HorizontalForm" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-name">Available variable</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <ion-icon name="close" role="img" class="md hydrated" aria-label="close"></ion-icon>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {ASSET_SET_TITLE},
                                    {ASSET_TITLE},
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yoo-card-body">
                <div class="yoo-padd-lr-20">
                    <div class="yoo-height-b20 yoo-height-lg-b20"></div>
                    <div class="yoo-profile-setting-container">


<!--                        <text-input v-model="form.first_name" :error="errors.first_name" class="pr-6 pb-8 w-full lg:w-1/2" label="First name" />-->

                        <div class="yoo-height-b25 yoo-height-lg-b25"></div>
                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1">Asset type</label>
                            <div class="input-group form-group-sm">
                                <div class="yoo-select">
                                    <select v-model="form.asset_type" id="inputState" class="form-control" :class="{ 'has-error': error('asset_type') }">
                                        <option :value="asset_type.value" v-for="(asset_type, key) in asset_types" :key="key">{{ asset_type.label }}</option>
                                    </select>
                                    <span class="form-text text-danger" v-if="error('asset_type')">{{ error('asset_type') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="yoo-height-b25 yoo-height-lg-b25"></div>
                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1">Thumbnail</label>
                            <div class="yoo-form-field">
                                <image-upload v-model="form.thumbnail"  :bg_color="form.bg_color"></image-upload>
                                <span class="form-text text-danger" v-if="error('thumbnail')">{{ error('thumbnail') }}</span>
                            </div>
                        </div>

                        <div class="yoo-height-b25 yoo-height-lg-b25"></div>
                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1">Background Color</label>
                            <div class="input-group form-group-sm">
                                <input v-model="form.bg_color" :class="{ 'has-error': error('bg_color') }"  type="color" class="form-control">
                                <span class="form-text text-danger"  v-if="error('bg_color')">{{ error('bg_color') }}</span>

                            </div>
                        </div>
                        <div class="yoo-height-b25 yoo-height-lg-b25"></div>
                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1">Name</label>
                            <div class="input-group form-group-sm">
                                <input v-model="form.name" type="email" class="form-control" :class="{ 'has-error': error('name') }" value="">
                                <span class="form-text text-danger" v-if="error('name')">{{ error('name') }}</span>
                            </div>
                        </div>

                        <div class="yoo-height-b25 yoo-height-lg-b25"></div>
                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1">Description </label>
                            <div class="input-group form-group-sm">
                                <textarea v-model="form.description" class="form-control" rows="10" :class="{ 'has-error': error('description') }"></textarea>
                            </div>
                        </div>

                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1"> </label>
                            <div class="input-group form-group-sm">
                                <p class="form-text text-danger" v-if="error('description')">{{ error('description') }}</p>
                                <p><a data-toggle="modal" href="#" data-target="#HorizontalForm">Click here</a> to view available variable</p>
                            </div>
                        </div>
                        <div class="yoo-height-b25 yoo-height-lg-b25"></div>
                        <div class="yoo-form-field-wrap yoo-style1">
                            <label class="yoo-form-field-label yoo-type1"> </label>
                            <div class="input-group form-group-sm">
                                <button :disabled="sending" @click="submit" class="btn-primary btn">Next</button>
                            </div>
                        </div>
                        <div class="yoo-height-b60 yoo-height-lg-b60"></div>
                    </div>
                    <div class="yoo-height-b5 yoo-height-lg-b5"></div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../MakeSumo/AppLayout'
    import Button from "../../Jetstream/Button";
    import ImageUpload from "./../../Shared/ImageUpload";

    export default {
        components: {
            Button,
            AppLayout,
            ImageUpload
        },
       props: {
           asset_types: Array,
       },
        data() {
            return {
                form: {
                    asset_type: this.asset_types[0].value,
                    bg_color: '#ffffff',
                    name: '',
                    description: '',
                    thumbnail: null
                },
                sending: false
            }
        },
        methods: {
            submit() {
                var data = new FormData()
                data.append('asset_type', this.form.asset_type || '')
                data.append('bg_color', this.form.bg_color || '')
                data.append('name', this.form.name || '')
                data.append('description', this.form.description || '')
                data.append('thumbnail', this.form.thumbnail || '')
                this.$inertia.post(route('asset-sets.store'), data, {
                    onStart: () => this.sending = true,
                    onFinish: () => this.sending = false,
                    preserveScroll: true
                })
            }
        }
    }
</script>
