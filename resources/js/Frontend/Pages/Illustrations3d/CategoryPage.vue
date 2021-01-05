<template>
    <div class="ms-site-content">
        <div class="ms-hero ms-version2">
            <div class="ms-hero-text">
                <div class="ms-hero-text-in">
                    <ol class="ms-breadcrumb">
                        <li class="ms-breadcrumb-item"><a href="#">Free 3d Illustrations</a></li>
                        <li class="ms-breadcrumb-item ms-active">{{ asset_set.name }}</li>
                    </ol>
                    <h1 class="ms-hero-title">✨ 3D illustrations in Grain style</h1>
                    <p class="ms-hero-subtitle">Grain styled illustrations are pixel-perfect and available in both free PNG &amp; SVG format for you. <br>
                        We cook unique illustration styles everyday. Get beautiful, handcrafted digital assets <br>
                        for your projects – without paying big-agency-price-tag.</p>
                    <search-box></search-box>
                </div>
            </div><!-- .ms-hero-text -->
        </div><!-- .ms-hero -->
        <div class="ms-site-content-in ms-version2">
            <div class="ms-illustration-list ms-style1 ms-col-7">

                <item :key="key" v-for="(item,key) in asset_set.items" :item="item" />


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
    components: {ShortFooter, SearchBox, Item},
        props: {
          asset_set: {
              type: Object
          }
        },
    }
</script>
