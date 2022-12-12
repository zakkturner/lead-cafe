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

<script>
export default {
    name: "SearchFilter",
   data() {
       return {

           searchQuery: ""
       }
   },
    methods:{
        submitSearch(e){
            e.preventDefault()
            console.log('http://localhost:8000/?search=' + this.searchQuery)
            axios.get('http://localhost:8000/prospects', {params: {search: this.searchQuery}} ).then((response)=>console.log(response)).catch((err)=>console.log(err))
        }
    }
}
</script>

<style scoped>

</style>
