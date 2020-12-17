<template>
    <frontend-layout>
        <search-result v-if="search_results.has_items" :search="search" :search_results="search_results"></search-result>
        <no-search-result v-else :search="search"></no-search-result>
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
            }
        },
        components: {SearchResult, FrontendLayout, NoSearchResult}
    }
</script>
