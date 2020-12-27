<template>
    <frontend-layout>

        <div class="ms-content ms-no-sidebar">
            <template v-if="open_modal">
                <div class="ms-overlay-section">
                    <button class="ms-cross-btn" @click="goBack()"></button>
                    <div class="ms-overlay-content ms-lg">
                        <editable-item :item="item"></editable-item>
                        <related-item :related_items="related_items"></related-item>
                        <popular-item :popular_items="popular_items"></popular-item>
                    </div>
                </div>

            </template>
            <template>
                <div class="pd-40">

                    <editable-item :item="item"></editable-item>

                    <related-item :related_items="related_items"></related-item>
                    <popular-item :popular_items="popular_items"></popular-item>

                </div>
            </template>


        </div>
    </frontend-layout>
</template>

<script>


import FrontendLayout from "../../FrontendLayout";
import EditableItem from "./EditableItem";
import RelatedItem from "./RelatedItem";
import PopularItem from "./PopularItem";

    export default {
        components: {PopularItem, RelatedItem, EditableItem, FrontendLayout},
        props: {
            item: {
                type: Object,
            },
            popular_items: {
                type: Array,
                required: true
            },
            related_items: {
                type: Array,
                required: true
            },
            open_modal: {
                type: Boolean,
                default: true,
            }
        },
        methods: {
            goBack() {
                window.history.back();
            }
        }
    }
</script>

<style>
.pd-40{
    padding: 40px;
}
</style>
