<template>
    <router-view></router-view>
</template>

<script>
import ProspectList from "./components/ProspectList";
import Sidebar from "./components/layout/Sidebar";
export default {
    name: "App.vue",
    components: {Sidebar, ProspectList },
    setup(){}

}
</script>

<style scoped>

</style>
