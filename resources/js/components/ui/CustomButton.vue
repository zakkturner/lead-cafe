<template>
    <div>
        <button class="btn btn-success" @click.prevent="addProspect">{{title}}</button>
    </div>
</template>
<script>
import axios from 'axios';
import {useSearchStore} from "../../store/SearchStore";
import {computed} from "vue";
export default {
    props: [
        'title',
        'phone_one',
        'address',
        'company',
        'website',
        'prospect'
    ],

   setup(props){
       let newProspect = {
           "phone_one": props.prospect.phone,
           "address": props.prospect.address,
           "company": props.prospect.title,
           "website": props.prospect.website
       }
       const searchStore = useSearchStore();
       const messageState = computed(()=> searchStore.getMessageState);
       const message = messageState.value;

       const addProspect = () =>{

            console.log(newProspect)
           axios.post('/api/prospects/create', newProspect).then(response =>{
               console.log(response)
               message.text = "Added Successfully";
               message.showMsg = true;
               message.success = true;
               message.failure = false;
               setTimeout(() => {
                   message.showMsg = false;
               }, 5000);
           }).catch((err)=>{
               message.text = err.message;
               message.showMsg = true;
               message.success = false;
               message.failure = true;
               setTimeout(() => {
                   message.showMsg = false;
               }, 5000);
           })
        }
        return {addProspect}
    }
}
</script>

<style scoped>

</style>
