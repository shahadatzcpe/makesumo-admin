<template>
    <frontend-layout>
        <search-result v-if="search_results.has_items"
                       :search="search"
                       :search_results="search_results"
                       :related_keywords="related_keywords"
        ></search-result>
        <no-search-result v-else :search="search" :related_keywords="related_keywords"
            :popular_illustrations3d="popular_illustrations3d"
            :popular_illustrations="popular_illustrations"
        ></no-search-result>
    </frontend-layout>
</template>

<script>
    import FrontendLayout from "../../FrontendLayout";
    import NoSearchResult from "./NoSearchResult";
    import SearchResult from "./SearchResult";
    export default {
        props: {
          'search_results': {
              type: Object,
              required: true
          },
            'search': {
              type: String,
              required: true,
              default: ''
            },
            related_keywords: {
                type: Array,
                required: true,
            },
            popular_illustrations3d: {
                type: Array,
                required: true,
            },
            popular_illustrations: {
                type: Array,
                required: true,
            }
        },
        components: {SearchResult, FrontendLayout, NoSearchResult}
    }
</script>
