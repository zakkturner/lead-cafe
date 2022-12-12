<template>
    <tbody v-for="prospect in prospects" :key="prospect.id">
        <tr>
        <td>{{ prospect.notes}}</td>
        <td>{{ prospect.company}}</td>
        <td>{{ prospect.address}}</td>
        <td>{{ prospect.phone_one}}</td>
        <td>{{ prospect.phone_two}}</td>
        <td>{{ prospect.email}}</td>
        <td>{{ prospect.website }}</td>
        <td>{{ prospect.contact}}</td>
        <td>{{ prospect.position }}</td>
        <td></td>
        <td>

         <a href="" class="btn btn-primary">View Prospect</a>
        </td>
        </tr>

    </tbody>

</template>

<script>
import {useProspectStore} from "../store/ProspectStore";
import {computed} from "vue";


export default {
    name: "ProspectList.vue",
    setup(){
        const prospectStore = useProspectStore();
        prospectStore.fetchProspects()
        const prospects = computed(()=> prospectStore.getProspects)
        console.log(prospects)
        return{prospects}
    }
}
</script>

<style scoped>

</style>
