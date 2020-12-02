<template>
    <app-layout>
        <card :asset_set="asset_set"></card>

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
    import Card from "./Card";

    export default {
        components: {
            Card,
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
                            colors: item.colors.map( function(color) {
                                return {
                                    id: color.color_id,
                                    is_editable: color.is_editable
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

