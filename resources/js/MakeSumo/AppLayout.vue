<template>
    <div>
    <div class="yoo-height-b60 yoo-height-lg-b60"></div>
    <application-header></application-header>
    <div class="yoo-sidebarheader-toggle">
        <div class="yoo-button-bar1"></div>
        <div class="yoo-button-bar2"></div>
        <div class="yoo-button-bar3"></div>
    </div><!-- .yoo-sidebarheader-toggle -->
    <left-sidebar></left-sidebar>

    <div class="yoo-content yoo-style1">
        <slot></slot>
    </div><!-- .yoo-content -->
    </div>
</template>

<script>

import LeftSidebar from '../MakeSumo/LeftSidebar'
import ApplicationHeader from '../MakeSumo/ApplicationHeader'
    export default {
        components: {
            LeftSidebar,
            ApplicationHeader
        },

        data() {
            return {}
        },

        methods: {
            logout() {
                axios.post(route('logout').url()).then(response => {
                    window.location = '/';
                })
            },
        },

        computed: {
            path() {
                return window.location.pathname
            }
        }
    }
</script>
