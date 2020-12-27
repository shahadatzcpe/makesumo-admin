<template>
    <div class="ms-search-results">
        <div class="ms-section-head ms-type4">
            <h3 class="ms-section-title">{{ label }} <span>({{ results.count }})</span></h3>
        </div>
        <div class="ms-illustration-list ms-style3 ms-col-10">
            <inertia-link class="ms-card ms-style1" :href="item.url" :key="item.id" v-for="item in results.items">
                <div class="ms-illustration-wrap">
                    <div class="ms-illustration">
                        <img :src="item.thumbnail_src" :alt="item.name">
                    </div>
                </div>
                <p class="ms-illustration-name">{{ item.name }}</p>
            </inertia-link>
        </div>
        <inertia-link  :href="route('frontend.'+this.type+'.index', {search})"><div class="ms-more-btn">See All</div></inertia-link>
    </div>
</template>

<script>
    export default {
        props: {
            label: {
                type: String,
                required: true
            },
            search: {
                type: String,
                required: true
            },
            type: {
                type: String,
                required: true
            },
            results: {
                type: Object,
                required: true
            }
        },
        data () {
            return {}
        }
    }
</script>

<style type="text/css" scoped>
    .ms-search-results2{
        background: #fff;
        transition: all 0.3s ease;
        padding: 19px 20px 0;
        border-radius: 20px;
        position: relative;
        display: block;
        border: 1px solid transparent;
        box-shadow: 0px 2px 6px rgba(233, 233, 243, 0.5);
        margin-bottom: 20px;
    }
</style>
