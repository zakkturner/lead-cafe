<template>
    <div>
        <button class="btn btn-success" @click="addProspect">{{title}}</button>
    </div>
</template>

<script>
export default {
    props: [
        'title',
        'phone_one',
        'address',
        'company',
        'website'
    ],
    methods: {
        addProspect(event){
            let newProspect = {

                "phone_one": this.phone_one,
                "address": this.address,
                "company": this.company,
                "website": this.website
            }

           axios.post('/prospects/', newProspect).then(response => console.log('added successfully'))
        }
    }
}
</script>

<style scoped>

</style>
