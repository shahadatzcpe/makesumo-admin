<template>
    <app-layout>
        <button class="btn btn-primary">New Set</button>
        <div v-for="(item, key) in items" :key="key">
            {{ item }}
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from './../MakeSumo/AppLayout'
    import Button from "../Jetstream/Button";

    export default {
        components: {
            Button,
            AppLayout
        },
        data() {
            return {
                items: [
                    1,2,3
                ]
            }
        }
    }
</script>
