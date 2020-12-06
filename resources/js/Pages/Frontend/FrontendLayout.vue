<template>
    <div>
        <slot></slot>
        <footer-section></footer-section>
    </div>
</template>

<script>
    import FooterSection from "./Sections/FooterSection";

    export default {
        components: {
            FooterSection
        }

    }
</script>
