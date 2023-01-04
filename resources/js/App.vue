<template>
    <router-view></router-view>
</template>

<script>
import ProspectList from "./components/ui/ProspectList.vue";
import Sidebar from "./components/ui/Sidebar";
export default {
    name: "App.vue",
    components: {Sidebar, ProspectList },
    setup(){}

}
</script>

<style scoped>

</style>
