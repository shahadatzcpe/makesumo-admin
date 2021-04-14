<template>
    <div class="ms-site-content">
        <div class="ms-hero ms-search-hero ms-remove-border">
            <div class="ms-hero-text">
                <div class="ms-hero-text-in">
                    <search-box class="search-result-page"></search-box>
                    <a href="#" class="ms-back-to-home">Free Illustrations</a>
                    <h3 class="ms-search-result-text">{{ capitalizeFirstLetter(search) }} 3d illustration</h3>
                    <div class="ms-search-result-subtext-wrap">
                        <p class="ms-search-result-subtext">Get free {{ search }} 3d illustrations. These free 3d illustrations are pixel-perfect to fit your design and available in both png and SVG vector. You can change colors easily and download right away. Be sure to check all <inertia-link :href="route('frontend.illustrations3d.index')">3d illustrations</inertia-link>.</p>
                    </div>
                    <div class="ms-related-tags">
                        <inertia-link :key="key" v-for="(searchTerm, key) in related_keywords"
                                      :href="route('frontend.illustrations3d.index', { search: searchTerm } )"
                                      class="ms-tag">{{ searchTerm }}</inertia-link>
                    </div>
                    <div class="cs-number-of-search-result">138 vector illustrations found</div>
                </div>
            </div><!-- .ms-hero-text -->
        </div><!-- .ms-hero -->
        <div class="ms-site-content-in">
            <div class="ms-local-search-results-wrap">
                <div class="ms-illustration-list ms-style3 ms-col-10">
                    <item :key="key" v-for="(item,key) in search_results" :item="item" />
                </div>
            </div>
            <short-footer></short-footer>
        </div>
    </div>
</template>

<script>
    import FrontendLayout from "../../FrontendLayout";
    import SiteBar from "./SiteBar";
    import Item from "./Item";
    import SearchBox from "./SearchBox";
    import ShortFooter from "../../Sections/ShortFooter";
    export default {
        components: {ShortFooter, Item, SiteBar, FrontendLayout,SearchBox},
        props: {
            related_keywords: {
                type: Array,
                required: true
            },
            search_results: {
                type: Array,
                required: true
            },
            search: {
                type: String
            }
        },

        methods: {
            capitalizeFirstLetter(abc) {
                return abc.charAt(0).toUpperCase() + abc.slice(1);
            }

        },
    }
</script>
