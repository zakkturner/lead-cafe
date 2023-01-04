<template>
<div>
<the-header></the-header>
    <slot></slot>
</div>
</template>

<script>
import TheHeader from "../ui/TheHeader.vue";

export default {
    name: "BaseLayout",
    components: {TheHeader}
}
</script>

<style scoped>

</style>
