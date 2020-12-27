<template>
    <frontend-layout>
        <site-bar v-if="asset_sets.length" :asset_sets="asset_sets" :asset_set="asset_set"></site-bar>


        <div class="ms-content" :class="{ 'ms-no-sidebar': !!!asset_sets.length}">

        <template v-if="this.search">

            <search-result v-if="search_results.length" :search="search" :search_results="search_results" :related_keywords="related_keywords"></search-result>
            <no-search-result v-else :search="search" :popular_items="popular_items" :related_keywords="related_keywords"></no-search-result>


        </template>

            <category-page v-else-if="asset_set.id" :asset_set="asset_set"></category-page>

            <illustration-index v-else :popular_items="popular_items"></illustration-index>
        </div>
    </frontend-layout>
</template>

<script>
    import FrontendLayout from "../../FrontendLayout";
    import SiteBar from "./SiteBar";
    import IllustrationIndex from "./IllustrationIndex";
    import CategoryPage from "./CategoryPage";
    import SearchResult from "./SearchResult";
    import NoSearchResult from "./NoSearchResult";
    export default {
        components: { SiteBar, FrontendLayout, IllustrationIndex, CategoryPage, SearchResult, NoSearchResult},
        // components: {FrontendLayout},
        props: {
            search: {
                type: String,
                required: true
            },
            search_results: {
                type: Array,
                required: true
            },
            popular_items: {
                type: Array,
                required: true
            },
            related_keywords: {
                type: Array,
                required: true
            },

            asset_sets: {
                type: Array,
                required: true,
            },
            asset_set: {
                type: Object,
            }
        }
    }
</script>
