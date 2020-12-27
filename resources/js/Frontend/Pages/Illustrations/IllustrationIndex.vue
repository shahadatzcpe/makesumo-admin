<template>
    <div class="ms-site-content">
        <div class="ms-hero ms-version2">
            <div class="ms-hero-text">
                <div class="ms-hero-text-in">
                    <h1 class="ms-hero-title">🙌&nbsp; Free vector illustration library for you.<br>Make your site, app or project stand out.</h1>
                    <p class="ms-hero-subtitle">Our free library is growing fast, so you’ll always find high-quality vector illustrations here. <br>Made by <a href="https://twitter.com/IshFillet" target="_blank">@ishfillet</a> &amp; friends – You can tweet me for illustration requests.</p>
                    <form :action="route('frontend.search.result')" class="ms-search-form">
                        <button class="ms-search-btn" type="submit">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.6781 18.892L15.9175 14.1315C17.0637 12.6057 17.6823 10.7485 17.6803 8.84015C17.6803 3.96572 13.7146 0 8.84015 0C3.96572 0 0 3.96572 0 8.84015C0 13.7146 3.96572 17.6803 8.84015 17.6803C10.7485 17.6823 12.6057 17.0637 14.1315 15.9175L18.892 20.6781C19.1331 20.8936 19.4474 21.0085 19.7704 20.9995C20.0936 20.9904 20.4009 20.858 20.6294 20.6294C20.858 20.4009 20.9904 20.0936 20.9995 19.7704C21.0085 19.4474 20.8936 19.1331 20.6781 18.892ZM2.52576 8.84015C2.52576 7.59128 2.8961 6.37046 3.58992 5.33206C4.28376 4.29367 5.26993 3.48433 6.42374 3.00642C7.57754 2.52849 8.84715 2.40345 10.072 2.64708C11.2969 2.89073 12.4221 3.49212 13.3051 4.37521C14.1882 5.25828 14.7896 6.3834 15.0332 7.60827C15.2769 8.83315 15.1518 10.1028 14.6739 11.2566C14.196 12.4104 13.3867 13.3966 12.3482 14.0904C11.3098 14.7842 10.089 15.1545 8.84015 15.1545C7.16609 15.1525 5.56117 14.4866 4.37742 13.3029C3.19368 12.1191 2.52777 10.5142 2.52576 8.84015Z" fill="black" fill-opacity="0.4"></path>
                            </svg>
                        </button>
                        <input v-model="form.search" required type="text" class="ms-search-input" placeholder="Search for illustrations...">
                        <div class="ms-clear">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M17.626 6.62472C17.1535 6.15224 16.3874 6.15231 15.9149 6.62486L11.9248 10.6149L8.00882 6.69894C7.53634 6.22646 6.77024 6.22652 6.29768 6.69908C5.82512 7.17164 5.82506 7.93774 6.29754 8.41022L10.2135 12.3262L6.22167 16.3181C5.74912 16.7906 5.74905 17.5567 6.22153 18.0292C6.69401 18.5017 7.46012 18.5016 7.93267 18.0291L11.9245 14.0372L15.8377 17.9504C16.3102 18.4229 17.0763 18.4228 17.5488 17.9502C18.0214 17.4777 18.0215 16.7116 17.549 16.2391L13.6358 12.3259L17.6259 8.33586C18.0984 7.86331 18.0985 7.0972 17.626 6.62472Z" fill="white"></path></svg>
                            <input type="reset">
                        </div>
                    </form>
                </div>
            </div><!-- .ms-hero-text -->
        </div><!-- .ms-hero -->
        <div class="ms-site-content-in ms-version2">
            <div class="ms-illustration-list ms-style1 ms-col-7">

                <item :key="key" v-for="(item,key) in popular_items" :item="item" />


            </div>

        </div>
    </div>
</template>

<script>
import Item from './Item'
export default {
    components: {Item},
    props: {
        popular_items: {
            type: Array,
            required: true
        },
    },
    data() {
        return {
            form: {
                search: '',
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.visit(route('frontend.search.result'), {
                method: 'get',
                data: this.form,
            })
        },
    },
}
</script>
