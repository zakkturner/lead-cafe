<template>
    <form>
        <div class="d-flex justify-content-between">
            <div class="form-group w-100 px-2">
                <label for="contact">Enter Search Query</label>
                <input type="text" class="form-control w-100" name="query" v-model="state.query">
            </div>
            <div class="d-flex justify-content-end pt-2">
                <button type="submit" class="btn btn-success" @click.prevent="searchForProspect">Search Prospects</button>
            </div>
        </div>
    </form>
</template>
<script>
import {reactive} from "vue";
import {useSearchStore} from "../../store/SearchStore";
export default {
    name: "SearchForm",
    setup(){
        const searchStore = useSearchStore()
        let state = reactive(
            {
                query: ""
            }
        )
        let searchForProspect = () =>{
            searchStore.searchGoogleProspects(state.query)
        }
        return { state, searchForProspect }
    }
}
</script>
<style scoped>
</style>
