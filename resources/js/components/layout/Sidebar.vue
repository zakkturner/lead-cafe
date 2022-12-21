<template>
<div class="w-25 card mt-4 mr-5 p-3">
    <h4>{{ title }}</h4>
    <search-filter></search-filter>

<!--    <check-box-filter></check-box-filter>-->
</div>
</template>

<script>
import SearchFilter from "../filters/SearchFilter";
import CheckBoxFilterFilter from "../filters/CheckBoxFilter";
import CheckBoxFilter from "../filters/CheckBoxFilter";


export default {
    name: "Sidebar",
    props: ['title'],

    components: {CheckBoxFilter, SearchFilter },
    mounted() {
        console.log(this.title)
    }
}
</script>

<style scoped>

</style>
