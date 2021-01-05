<template>
    <div class="ms-site-content">
        <div class="ms-hero ms-version2">
            <div class="ms-hero-text">
                <div class="ms-hero-text-in">
                    <h1 class="ms-hero-title">😞 Whoops, nothing found for “{{ search }}”...</h1>
                    <p class="ms-hero-subtitle">Please check spelling or try a different keyword...</p>
                    <search-box></search-box>
                </div>
            </div><!-- .ms-hero-text -->
        </div><!-- .ms-hero -->
        <div class="ms-site-content-in ms-version2">
            <div class="ms-popular-assets-title">Most popular assets</div>
            <div class="ms-illustration-list ms-style1 ms-col-7">

                <item :key="key" v-for="(item,key) in popular_items" :item="item" />

            </div>

            <short-footer></short-footer>
        </div>
    </div>
</template>

<script>
import FrontendLayout from "../../FrontendLayout";
import SiteBar from "./SiteBar";
import Item from './Item'

import SearchBox from "./SearchBox";
import ShortFooter from "../../Sections/ShortFooter";
export default {
    components: {ShortFooter, SiteBar, FrontendLayout, Item,SearchBox},
    props: {
        related_keywords: {
            type: Array,
            required: true
        },
        popular_items: {
            type: Array,
            required: true
        },
        search: {
            type: String
        }
    },
}
</script>
