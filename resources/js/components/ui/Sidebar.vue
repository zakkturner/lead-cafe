<template>
<div class=" w-25 card mt-4 mr-5 p-3 d-flex  flex-row align-items-center justify-content-around">



</div>
</template>

<script>
import SearchFilter from "../filters/SearchFilter";
import CheckBoxFilterFilter from "../filters/CheckBoxFilter";
import CheckBoxFilter from "../filters/CheckBoxFilter";
import Pagination from "./Pagination.vue";


export default {
    name: "Sidebar",
    props: ['title'],

    components: {Pagination, CheckBoxFilter, SearchFilter },
    mounted() {
        console.log(this.title)
    }
}
</script>

<style scoped>

</style>
