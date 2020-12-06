<template>
    <frontend-layout>
        <search-result v-if="search_results.has_items"></search-result>
        <no-search-result v-else></no-search-result>
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
          }
        },
        components: {SearchResult, FrontendLayout, NoSearchResult}
    }
</script>

<style>
    .ms-sub-header{
        display: none;
    }
</style>
