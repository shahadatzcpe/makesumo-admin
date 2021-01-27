<template>
    <layout>

            <form action="#" class="ms-settings-form">
                <div class="ms-settings-subtitle-head">
                    <h2 class="ms-settings-subtitle">Password Settings</h2>
                    <button class="ms-btn ms-style1 ms-small" @click="changePassword">Save Changes</button>
                </div>
                <div class="ms-form-field-group ms-max-width-420">
                    <label class="ms-form-label">Current password</label>
                    <input type="text" class="ms-form-field" placeholder="Your current password">
                </div>
                <div class="ms-form-field-group ms-max-width-420">
                    <label class="ms-form-label">New password</label>
                    <input type="text" class="ms-form-field" placeholder="Your new password">
                </div>
                <div class="ms-form-field-group ms-max-width-420">
                    <label class="ms-form-label">Confirm password</label>
                    <input type="text" class="ms-form-field" placeholder="Your new password">
                </div>
            </form>

    </layout>
</template>

<script>

import Layout from "./Layout";
export default {
    components: {Layout},
    methods: {
        changePassword () {

        }
    }
}
</script>
