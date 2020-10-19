<template>
    <div>
    <div class="yoo-height-b60 yoo-height-lg-b60"></div>
    <header class="yoo-header yoo-style1 yoo-sticky-menu">
        <div class="yoo-main-header">
            <div class="yoo-main-header-in">
                <div class="yoo-main-header-left">
                    <a href="https://makesumo.com" class="yoo-logo-link yoo-light-logo">
                        <application-logo/>
                    </a>
                    <!-- For Site Title -->
                    <!-- <span class="yoo-site-title">
                      <a href="index.html">Logo</a>
                    </span> -->
                </div>
                <div class="yoo-main-header-right">
                    <div class="yoo-nav-wrap yoo-fade-up">

                    </div>
                    <!-- .yoo-nav-wrap -->
                    <ul class="yoo-ex-nav yoo-style1 yoo-flex yoo-mp0">


                        <li>
                            <div class="yoo-toggle-body yoo-profile-nav yoo-style1">
                                <div class="yoo-toggle-btn yoo-profile-nav-btn">
                                    <div class="yoo-profile-nav-text">
                                        <span>Welcome,</span>
                                        <h4>Thom Yorke</h4>
                                    </div>
                                    <div class="yoo-profile-nav-img">
                                        <img src="assets/img/profile-pic.png" alt="profile">
                                    </div>
                                </div>
                                <ul class="yoo-dropdown yoo-style1">
                                    <li>
                                        <a href="#"><ion-icon name="person-circle"></ion-icon>My Profile</a>
                                    </li>
                                    <li class="yoo-dropdown-cta"><a href="#">Sign Out</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header><!-- .yoo-header -->
    <div class="yoo-sidebarheader-toggle">
        <div class="yoo-button-bar1"></div>
        <div class="yoo-button-bar2"></div>
        <div class="yoo-button-bar3"></div>
    </div><!-- .yoo-sidebarheader-toggle -->
    <div class="yoo-sidebarheader">
        <div class="yoo-sidebarheader-in" data-scrollbar>
            <div class="yoo-sidebar-nav">
                <ul class="yoo-sidebar-nav-list yoo-mp0">
                    <li>
                        <a href="index.html" >
              <span class="yoo-sidebar-link-title">
                <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="layers"></ion-icon></span>
                <span class="yoo-sidebar-link-text">Dashboard</span>
              </span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.html">
              <span class="yoo-sidebar-link-title">
                <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                <span class="yoo-sidebar-link-text">Assets</span>
              </span>
                        </a>
                    </li>

                    <li>
                        <a href="settings.html">
              <span class="yoo-sidebar-link-title">
                <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                <span class="yoo-sidebar-link-text">Asset Sets</span>
              </span>
                        </a>
                    </li>


                    <li>
                        <a href="settings.html">
              <span class="yoo-sidebar-link-title">
                <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="create"></ion-icon></span>
                <span class="yoo-sidebar-link-text">Tags</span>
              </span>
                        </a>
                    </li>
                    <li>
                        <a href="calender.html">
              <span class="yoo-sidebar-link-title">
                <span class="yoo-sidebar-link-icon yoo-style1"><ion-icon name="calendar"></ion-icon></span>
                <span class="yoo-sidebar-link-text">Settings</span>
              </span>
                        </a>
                    </li>
                </ul><!-- .yoo-sidebar-nav-list -->
            </div>
        </div>
    </div><!-- .yoo-sidebarheader -->

    <div class="yoo-content yoo-style1">


    </div><!-- .yoo-content -->
    </div>
</template>

<script>
import ApplicationLogo from '../MakeSumo/ApplicationLogo'
    export default {
        components: {
            ApplicationLogo
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
