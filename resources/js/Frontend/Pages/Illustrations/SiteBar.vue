<template>
    <div class="ms-sidebar ms-version2">
        <h2 class="ms-sidebar-heading">✨ <span>Choose style</span></h2>
        <div class="ms-catagories">
            <inertia-link :href="route('frontend.illustrations.index')" class="ms-catagory">
                <div class="ms-catagory-img">
                    <img src="/assets/img/all-style.svg" alt="All style">
                </div>
                <span class="ms-catagory-title">All Styles</span>
            </inertia-link>
            <inertia-link v-for="aset in assetSets" :key="aset.id"
               :href="aset.url" class="ms-catagory" :class="{'ms-active': assetSet && assetSet.id === aset.id }" :style="{'background-color' : aset.bg_color}">
                <div class="ms-catagory-img">
                    <img :src="aset.thumbnail_src" :alt="aset.name">
                </div>
                <span class="ms-catagory-title">{{ aset.name }}</span>
            </inertia-link>
        </div>
        <div class="ms-sidebar-seperator"></div>
        <h2 class="ms-sidebar-heading">🔥 <span>HOT Categories</span></h2>
        <div class="ms-tages">
            <a href="#" class="ms-tag">Tech</a>
            <a href="#" class="ms-tag">Business</a>
            <a href="#" class="ms-tag">VR</a>
            <a href="#" class="ms-tag">tech</a>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            assetSets: {
                type: Array,
                required: true,
            },
            assetSet: {
                type: Object,
            }
        }
    }
</script>
