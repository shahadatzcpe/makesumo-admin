<template>
    <div>
        <header-section></header-section>
        <slot></slot>
        <footer-section></footer-section>
    </div>
</template>

<script>
    import FooterSection from "./Sections/FooterSection";
    import HeaderSection from "./Sections/HeaderSection";

    export default {
        components: {
            FooterSection,
            HeaderSection
        }
    }
</script>
