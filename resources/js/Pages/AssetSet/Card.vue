<template>
    <div class="card" style="margin-bottom:15px">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                    <span v-if="asset_set.is_free" class="free">Free</span>
                    <span  v-if="asset_set.is_trashed" class="trashed">Trashed</span>
                    <div :style="{ 'background-color': asset_set.bg_color }"><img :src="asset_set.thumbnail_src" style="border-radius: 5px; max-width: 200px"></div>
                </div>
                <div class="col">
                    <div class="float-right">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <inertia-link class="dropdown-item" :href="route('asset-sets.show', asset_set.id)">Items</inertia-link>
                                <inertia-link class="dropdown-item" :href="route('asset-sets.edit', asset_set.id)">Edit</inertia-link>
                                <inertia-link class="dropdown-item" :href="route('asset-sets.pending-items', asset_set.id)">Draft Items</inertia-link>
                                <inertia-link class="dropdown-item" :href="route('asset-sets.upload-items', asset_set.id)">Upload form</inertia-link>
                                <button v-if="!asset_set.is_trashed" class="dropdown-item" @click="destroy">Delete</button>
                                <button  v-if="asset_set.is_trashed"  class="dropdown-item" @click="restore">Restore</button>

                            </div>
                        </div>
                    </div>
                    <a v-if="show_link" :href="route('asset-sets.show', asset_set.id)"><h4>{{ asset_set.name }} - <small class="text-muted">{{ asset_set.asset_type }}</small> </h4></a>
                    <h4 v-else>{{ asset_set.name }} - <small class="text-muted">{{ asset_set.asset_type }}</small> </h4>
                    <div>{{ asset_set.description }}</div>
                    <div>Background Color: {{ asset_set.bg_color }}</div>
                    <div>Total Items: {{ asset_set.total_items }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
           asset_set: Object,
            show_link: {
               default: false
            }
       },
        methods: {
            destroy() {
                this.$inertia.post(route('asset-sets.delete', this.asset_set.id), {
                    '_method': 'delete'
                }, {preserveScroll: true})
            },
            restore() {
                this.$inertia.post(route('asset-sets.restore', this.asset_set.id), {}, {preserveScroll: true})
            }
        }
    }
</script>

<style>

    .free {
        position: absolute;
        background: #00ff95;
        padding: 2px 9px;
        border-radius: 5px;
    }

    .trashed{
        background-color: red;
        padding: 2px 10px;
        right: 0;
        position: absolute;
        border-radius: 5px;
    }
</style>
