<template>

    <div class="ms-card ms-style1" >
        <div class="ms-illustration-wrap">
            <div class="ms-illustration">
                <img :src="item.thumbnail_src" :alt="item.name">
            </div>
        </div>
        <p class="ms-illustration-name">{{ item.name }}</p>
    </div>

</template>

<script>
export default{
    props: ['item']
}
</script>
