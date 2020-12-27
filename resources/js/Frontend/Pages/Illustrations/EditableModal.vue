<template>
    <div class="ms-overlay-section">
        <button class="ms-cross-btn"></button>
        <div class="ms-overlay-content ms-lg">
            <editable-item :item="item"></editable-item>
        </div>
    </div>
</template>

<script>




// Source from:  http://stackoverflow.com/questions/18480474/how-to-save-an-image-from-canvas

/* Canvas Donwload */
import EditableItem from "./EditableItem";

import InputColorPicker from "../../../Shared/InputColorPicker";
    export default {
        components: {EditableItem, InputColorPicker},
        props: {
            item: {
                type: Object,
            }
        }
    }

</script>
