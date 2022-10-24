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
        'website',
        'prospect'
    ],
    mounted() {
    console.log(this.prospect)
        },
    methods: {
        addProspect(event){
            let newProspect = {

                "phone_one": this.prospect.phone_one,
                "address": this.prospect.address,
                "company": this.prospect.company,
                "website": this.prospect.website
            }

           axios.post('/prospects/', newProspect).then(response => console.log('added successfully'))
        }
    }
}
</script>

<style scoped>

</style>
