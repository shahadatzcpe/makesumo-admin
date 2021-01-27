<template>
    <layout>
        <form action="#" class="ms-settings-form">
            <div class="ms-settings-subtitle-head">
                <h2 class="ms-settings-subtitle">Profile Settings</h2>
                <button class="ms-btn ms-style1 ms-small" @click="updateProfile">Save Changes</button>
            </div>
            <div class="ms-form-field-group ms-max-width-420">
                <label class="ms-form-label">Your name</label>
                <input type="text" class="ms-form-field" placeholder="Your name">
            </div>
            <div class="ms-form-field-group ms-max-width-420">
                <label class="ms-form-label">Your email</label>
                <input type="email" class="ms-form-field" placeholder="Your email">
            </div>
        </form>
    </layout>
</template>

<script>
import Layout from "./Layout";
export default {
    components: {Layout},
    methods: {
        updateProfile() {

        }
    }
}
</script>
