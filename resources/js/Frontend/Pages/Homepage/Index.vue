<template>
    <frontend-layout>
        <hero/>
        <image-box-1/>
        <where-to-use/>
        <homepage-2d-preview/>
        <homepage-3d-preview/>
    </frontend-layout>
</template>

<script>
    import FrontendLayout from "../../FrontendLayout";
    import Homepage3dPreview from "./Homepage3dPreview";
    import Homepage2dPreview from "./Homepage2dPreview";
    import WhereToUse from "./WhereToUse";
    import ImageBox1 from "./ImageBox1";
    import Hero from "./Hero";
    export default {
        components: {FrontendLayout, Homepage3dPreview, Homepage2dPreview, WhereToUse,ImageBox1, Hero}
    }
</script>
