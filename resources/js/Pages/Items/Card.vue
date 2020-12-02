<template>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-auto">
                   <img :src="item.thumbnail_src" style="border-radius: 5px">
                </div>
                <div class="col">
                    <div class="float-right">
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <button class="dropdown-item" @click="markAsDraft(item)">Mark as draft</button>
                            </div>
                        </div>
                    </div>
                    <h4><a href="#">{{ item.name }}</a></h4>
                    <div>
                        <span>Detected colors: {{ item.colors.length }} </span>,
                        <span>Editable colors: {{ editableColours.length }} </span>
                    </div>
                    <div style="display: flex">Editable colors:
                        <div v-for="color in editableColours" class="color" :style="{backgroundColor: color.color_code}"></div>
                    </div>
                    <div v-if="item.tags.length">Tags:
                        <template v-for="tag in item.tags"><a  href="#">{{ tag }}</a>, </template>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import AppLayout from '../../MakeSumo/AppLayout'
    import Tags from "../../Shared/Tags";
    import Button from "../../Jetstream/Button";

    export default {
        components: {
            Button,
            Tags,
            AppLayout
        },
        props: {
            item: Object
        },
        data() {
            return {
                hide: fasle,
            }
        },
        computed: {
            editableColours () {
                return this.item.colors.filter(item => item.is_editable)
            }
        },
        methods: {
            markAsDraft (item) {
                this.$inertia.get(route('items.update', item.id), {}, {
                    onFinish: () => this.hide = true,
                    preserveScroll: true
                })
            }
        }
    }
</script>
