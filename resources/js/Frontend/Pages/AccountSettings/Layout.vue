<template>
    <frontend-layout>
        <div class="ms-content ms-no-sidebar ms-white">
            <div class="ms-site-content-in">
                <div class="ms-settings">
                    <div class="ms-settings-container-md">
                        <h1 class="ms-setting-title">Account Settings</h1>
                        <div class="ms-settings-nav">
                            <inertia-link :href="route('account-settings.profile')" :class="{active: $page.currentRouteName === 'account-settings.profile'}">Account</inertia-link>
                            <inertia-link :href="route('account-settings.password')" :class="{active: $page.currentRouteName === 'account-settings.password'}">Security</inertia-link>
                            <inertia-link :href="route('account-settings.plan')" :class="{active: $page.currentRouteName === 'account-settings.plan'}">Plans</inertia-link>
                        </div>

                        <slot></slot>

                    </div>
                </div>

            </div>
        </div>
    </frontend-layout>
</template>

<script>
import FrontendLayout from "../../FrontendLayout";

export default {
    components: {FrontendLayout}
}
</script>
