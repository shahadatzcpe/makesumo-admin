<template>
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
                                        <h4>Md Shahadat Hossain</h4>
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
</template>

<script>
    import ApplicationLogo from '../MakeSumo/ApplicationLogo'
    export default {
        components: {
            ApplicationLogo
        }
    }
</script>
