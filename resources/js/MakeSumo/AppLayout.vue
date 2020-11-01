<template>
    <div id="wrapper">

        <application-sidebar></application-sidebar>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               <application-header></application-header>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <slot></slot>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <application-footer></application-footer>

        </div>
        <!-- End of Content Wrapper -->

    </div>
</template>

<script>

import LeftSidebar from '../MakeSumo/LeftSidebar'
import ApplicationHeader from '../MakeSumo/ApplicationHeader'
import ApplicationFooter from '../MakeSumo/ApplicationFooter'
import ApplicationLogo from '../MakeSumo/ApplicationLogo'
import ApplicationSidebar from "./ApplicationSidebar";
    export default {
        components: {
            ApplicationSidebar,
            LeftSidebar,
            ApplicationHeader,
            ApplicationLogo,
            ApplicationFooter
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
