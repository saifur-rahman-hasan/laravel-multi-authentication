<template>
    <div id="app">

        <!-- App Navbar -->
        <app-navbar :brandLogo="appLogo"></app-navbar>

        <!-- Router View -->
        <router-view></router-view>

    </div>
</template>

<script>
    export default {
        name: 'app',
        data () {
            return {
                appLogo: './src/assets/logo.png',
            }
        }
    }
</script>

<style></style>
