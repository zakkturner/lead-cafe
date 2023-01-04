<template>
    <nav aria-label="Page navigation example " class="d-flex align-items-center">
        <ul class="pagination mb-0">
<!--            debug: {{currentPage}}-->
            <li class="page-item"><button class="page-link" @click="prospectStore.prevPage">Previous</button></li>
            <li class="page-item" v-for="n in pageAmount"><button class="page-link" @click.prevent="jumpToPage(n)">{{ n }}</button></li>
            <li class="page-item"><button class="page-link" @click="prospectStore.nextPage">Next</button></li>
        </ul>
    </nav>
</template>

<script>
import {useProspectStore} from "../../store/ProspectStore";
import { computed } from 'vue';


export default {
    name: "Pagination",
    setup(){
        const prospectStore = useProspectStore();
        const pageAmount = computed(() => prospectStore.getPageAmount)
        const currentPage = computed(()=>prospectStore.getCurrentPage)

        const  jumpToPage = (pageNum) =>{
            prospectStore.jumpToPage(pageNum)
        }
        return {prospectStore, pageAmount, currentPage, jumpToPage}
    }

}
</script>

<style scoped>

</style>
