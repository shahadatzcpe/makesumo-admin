<template>
    <div class="ms-hero ms-style1">
        <div class="ms-hero-text">
            <div class="ms-hero-text-in">
                <h1 class="ms-hero-title">Free illustrations, 3D assets, <br>icons, &amp; design tools.</h1>
                <p class="ms-hero-subtitle">Beautifully designed digital assets for your website, app, blog, or presentation. <br>Customize everything directly in the browser, and download right away.</p>
                <form :action="route('search.result')" class="ms-search-form" @submit.prevent="submit">
                    <input v-model="form.search" name="search" class="ms-search-input" placeholder="Search for illustrations...">
                    <button class="ms-search-btn"><svg width="18" height="18" viewBox="0 0 18 18" fill="rgba(0,0,0,0.4)" xmlns="http://www.w3.org/2000/svg"><path d="M17.7241 16.1932L13.6436 12.1127C14.626 10.8049 15.1563 9.21298 15.1546 7.57727C15.1546 3.39919 11.7554 0 7.57727 0C3.39919 0 0 3.39919 0 7.57727C0 11.7554 3.39919 15.1546 7.57727 15.1546C9.21298 15.1563 10.8049 14.626 12.1127 13.6436L16.1932 17.7241C16.3998 17.9088 16.6692 18.0073 16.9461 17.9996C17.2231 17.9918 17.4865 17.8783 17.6824 17.6824C17.8783 17.4865 17.9918 17.2231 17.9996 16.9461C18.0073 16.6692 17.9088 16.3998 17.7241 16.1932ZM2.16494 7.57727C2.16494 6.50681 2.48237 5.46039 3.07708 4.57034C3.6718 3.68029 4.51709 2.98657 5.50606 2.57693C6.49503 2.16728 7.58327 2.0601 8.63317 2.26893C9.68306 2.47777 10.6475 2.99325 11.4044 3.75018C12.1613 4.5071 12.6768 5.47148 12.8856 6.52137C13.0945 7.57127 12.9873 8.65951 12.5776 9.64848C12.168 10.6375 11.4743 11.4828 10.5842 12.0775C9.69415 12.6722 8.64773 12.9896 7.57727 12.9896C6.14236 12.9879 4.76672 12.4171 3.75208 11.4025C2.73744 10.3878 2.16666 9.01218 2.16494 7.57727Z" fill="inherit"></path></svg></button>
                </form>
            </div>
        </div><!-- .ms-hero-text -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    search: '',
                },
            }
        },
        methods: {
            submit() {
                this.$inertia.visit(route('search.result'), {
                    method: 'get',
                    data: this.form,
                })
            },
        },
    }
</script>
