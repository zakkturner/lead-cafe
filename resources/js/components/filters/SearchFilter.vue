<template>
    <div class="position-relative d-flex items-center  align-items-center d-lg-inline-flex search-container">
        <form class="form-control ">
        <div class="form-group m-2 d-flex">
            <input class="form-control" type="text" placeholder="Search for Restaurant" v-model="searchQuery"/>
            <button type="submit" class="btn btn-primary" @click="submitSearch">Search</button>

        </div>
        </form>
    </div>
</template>

<script >
import { defineComponent, ref } from 'vue';
import { useProspectStore } from "../../store/ProspectStore";

export default {
    name: "SearchFilter",
   setup(){
       const prospectStore = useProspectStore()

        const searchQuery = ref("")
       const submitSearch = (e)=>{
           e.preventDefault();
            if(searchQuery.value !== ''){
                console.log(searchQuery);
                prospectStore.fetchProspect(searchQuery.value);
            }
            else {
                prospectStore.fetchProspects()
            }
       }
       return {submitSearch, searchQuery}
   }
}
</script>

<style scoped>

</style>
