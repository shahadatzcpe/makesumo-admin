<template>
    <div>
        <label for="tags-basic">Type a new tag and press enter</label>
        <b-form-tags
            input-id="tags-basic" v-model="tags"
            separator=" ,;"
        ></b-form-tags>
    </div>
</template>

<script>
    export default {
        props: ['value'],
        data() {
            return {
                tags: this.value
            }
        },
        watch: {
            tags: function () {
                this.$emit('input', this.tags)
            }
        },
    }
</script>
