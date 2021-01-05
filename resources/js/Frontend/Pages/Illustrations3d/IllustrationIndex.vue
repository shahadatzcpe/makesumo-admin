<template>
    <div class="ms-site-content">
        <div class="ms-hero ms-version2">
            <div class="ms-hero-text">
                <div class="ms-hero-text-in">
                    <h1 class="ms-hero-title">🙌&nbsp; Free 3D illustration library for you.<br>Make your site, app or project stand out.</h1>
                    <p class="ms-hero-subtitle">Our free library is growing fast, so you’ll always find high-quality vector illustrations here. <br>Made by <a href="https://twitter.com/IshFillet" target="_blank">@ishfillet</a> &amp; friends – You can tweet me for illustration requests.</p>
                    <search-box></search-box>
                </div>
            </div><!-- .ms-hero-text -->
        </div><!-- .ms-hero -->
        <div class="ms-site-content-in ms-version2">
            <div class="ms-illustration-list ms-style1 ms-col-7">

                <item :key="key" v-for="(item,key) in popular_items" :item="item" />


            </div>
            <short-footer></short-footer>
        </div>
    </div>
</template>

<script>
import Item from './Item'

import SearchBox from "./SearchBox";
import ShortFooter from "../../Sections/ShortFooter";
export default {
    components: {ShortFooter, Item, SearchBox},
    props: {
        popular_items: {
            type: Array,
            required: true
        },
    },
}
</script>
