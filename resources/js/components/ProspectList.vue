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

         <a href="" class="btn btn-primary" @click.prevent="openModal(prospect)" >Edit Prospect</a>
        </td>
        </tr>

    </tbody>
<modal modal_title="Edit Restaurant" :modalOpen="state.modalOpen" @close="state.modalOpen = !state.modalOpen" :prospect="state.selectedProspect" v-if="state.selectedProspect" type="update">
    <update-form :prospect="state.selectedProspect"></update-form>
</modal>
</template>

<script>
import {useProspectStore} from "../store/ProspectStore";
import {computed, reactive, ref} from "vue";
import Modal from "./layout/TheModal";
import UpdateForm from "./forms/UpdateForm";

export default {
    name: "ProspectList.vue",
    components: {Modal, UpdateForm},
    setup(){
        const prospectStore = useProspectStore();
        const state = reactive({modalOpen: false, selectedProspect: null});
        prospectStore.fetchProspects();

        const openModal = (prospect) => {
            state.modalOpen = true;
            state.selectedProspect = prospect;
        }
        const prospects = computed(()=> prospectStore.getProspects)
        return{prospects, openModal, state}
    }
}
</script>

<style scoped>

</style>
