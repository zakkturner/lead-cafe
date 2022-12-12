<template>
<!--    <tbody>-->
<!--        <tr>-->
<!--        <td>{{$prospect->notes}}</td>-->
<!--        <td>{{$prospect->company}}</td>-->
<!--        <td>{{$prospect->address}}</td>-->
<!--        <td>{{$prospect->phone_one}}</td>-->
<!--        <td>{{$prospect->phone_two}}</td>-->
<!--        <td>{{$prospect->email}}</td>-->
<!--        <td>{{$prospect->web_url}}</td>-->
<!--        <td>{{$prospect->contact}}</td>-->
<!--        <td>{{$prospect->position}}</td>-->
<!--        <td>{{$prospect->pretty_created}}</td>-->
<!--        <td>-->

<!--&lt;!&ndash;            <a href="{{route('admin.prospects.show', $prospect->id)}}" class="btn btn-primary">View Prospect</a>&ndash;&gt;-->
<!--        </td>-->
<!--        </tr>-->

<!--    </tbody>-->
    <div v-for="prospect in prospects">{{prospect.company}}</div>
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
