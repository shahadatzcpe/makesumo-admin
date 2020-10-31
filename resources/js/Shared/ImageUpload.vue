<template>
    <div>
        <div class="imagePreviewWrapperColor"
             :style="{ 'background-color': bg_color }">
            <div
                class="imagePreviewWrapper"
                :style="{ 'background-image': `url(${previewImage})` }"
                @click="selectImage">
            </div>
        </div>
        <input
            ref="fileInput"
            type="file"
            @input="pickFile">
        <button @click="remove">Remove image</button>
    </div>
</template>

<script>
    import Button from "../Jetstream/Button";
    export default {
        components: {Button},
        props: {
            bg_color: String,
            previewImageUrl: null
        },
        data() {
            return {
                previewImage: this.previewImageUrl
            };
        },
        methods: {
            selectImage () {
                this.$refs.fileInput.click()
            },
            pickFile () {
                this.$emit('input', 2121212)
                let input = this.$refs.fileInput
                let file = input.files
                if (file && file[0]) {
                    let reader = new FileReader
                    reader.onload = e => {
                        this.previewImage = e.target.result
                    }
                    reader.readAsDataURL(file[0])
                    this.$emit('input', file[0])
                }
            },
            remove () {
                this.previewImage = null
                this.$emit('input', null)
            }
        }
    }
</script>

<style scoped>
    .imagePreviewWrapperColor{
        width: 200px;
        height: 200px;
    }
    .imagePreviewWrapper {
        width: 200px;
        height: 200px;
        display: block;
        cursor: pointer;
        background-size: cover;
        background-position: center center;
        border: 5px dashed #333;
    }
</style>
