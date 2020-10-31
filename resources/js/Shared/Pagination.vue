<template>
    <nav>
        <ul class="pagination">
            <template v-for="(link, key) in links">
                <li v-if="link.url === null" :key="key" class="page-item"><a class="page-link" href="#" v-html="link.label"></a></li>
                <li v-else :key="key" class="page-item"  :class="{ 'active': link.active }">
                    <inertia-link
                                  :key="key"
                                  class="page-link"
                                  :class="{ 'active': link.active, 'ml-auto': link.label === 'Next' }"
                                  :href="link.url" preserve-scroll v-html="link.label"
                    ></inertia-link>
                </li>
            </template>
        </ul>
    </nav>
</template>

<script>
    export default {
        props: {
            links: Array,
        },
    }
</script>
