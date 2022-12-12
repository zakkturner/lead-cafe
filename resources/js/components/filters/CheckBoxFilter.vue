<template>
    <div class="search-container">

        <form class="form-control">

        <div class="form-check" v-for="city of cities">
            <input class="form-check-input" type="checkbox" :value="city" :id="city" v-model="selectedCities">
            <label class="form-check-label" :for="city">
                {{ city }}
            </label>
        </div>
            <button type="submit" class="btn btn-primary" @click="submitFilter">Filter</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "CheckBoxFilter",
    // props: ['prospects'],
   data(){
    return{
        prospects: [],
        cities: [],
        selectedCities: []
    }
   },
  async created() {
     await axios.get('http://localhost:8000/api/prospects/all').then(response => this.prospects = JSON.parse(JSON.stringify(response.data)) )
    this.prospects.forEach(prospect => {
        let address = prospect.address
        let comma = address.indexOf(',');
        let city;
        if(address.includes("United States")){
           city = address.slice(comma + 1, address.length - 20).trim();
        } else{
            city = address.slice(comma + 1, address.length - 5).trim();
        }
        if(this.cities.includes(city)){
            return;
        }else{
            this.cities.push(city);
        }

    })
    },
    methods:{
        submitFilter(e){
            e.preventDefault();
            console.log(this.selectedCities)
           const res = axios.get('http://localhost:8000/api/prospects/all', {
                headers: {'content-type': 'application/x-www-form-urlencoded'},
                    params: {
                        selectedCities: this.selectedCities
                    }
                }
           )
        }
    }

}
</script>

<style scoped>

</style>
