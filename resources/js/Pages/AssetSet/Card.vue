<template>
    <div class="card">

        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="asset-set-img" :style="{background: asset_set.bg_color }">
                        <img class="card-img-top" :src="asset_set.thumbnail_src" alt="Card image cap">
                    </div>
                    <div class="background-color">Background color:{{ asset_set.bg_color }}</div>
                    <div class="text-color">Text color: {{ asset_set.bg_color }}</div>
                    <div class="text-color">Total Assets: {{ asset_set.number_of_assets }}</div>
                </div>
                <div class="col-sm-8">
                    <h5 class="card-title">{{ asset_set.name }} - <span class="text-blue-gray">{{ asset_set.asset_type }}</span> </h5>
                    <div class="card-description">{{ asset_set.description }}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Input from "../../Jetstream/Input";
    export default {
        components: {Input},
        props: {
           asset_set: Object,
           filters: Object
       },
    }
</script>
