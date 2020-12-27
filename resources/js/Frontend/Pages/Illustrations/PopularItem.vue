<template>
    <div>
        <div class="ms-section-head ms-type3">
            <h3 class="ms-section-title">Popular items</h3>
            <a href="#" class="ms-btn ms-style2">View More<svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.209209 0.209209C0.488155 -0.0697365 0.940416 -0.0697365 1.21936 0.209209L5.50508 4.49492C5.78402 4.77387 5.78402 5.22613 5.50508 5.50508L1.21936 9.79079C0.940416 10.0697 0.488155 10.0697 0.209209 9.79079C-0.0697365 9.51184 -0.0697365 9.05958 0.209209 8.78064L3.98985 5L0.209209 1.21936C-0.0697365 0.940416 -0.0697365 0.488155 0.209209 0.209209Z" fill="#506BF0"></path></svg></a>
        </div>

        <div class="ms-illustration-list ms-style2 ms-col-6">

            <item :key="key" v-for="(item,key) in popular_items" :item="item" />

        </div>
    </div>
</template>

<script>
import Item from "./Item";
export default {
    components: {Item},
    props: {
        popular_items: {
            type:Array
        }
    }
}
</script>
