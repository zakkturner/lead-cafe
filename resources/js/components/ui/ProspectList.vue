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
        <td>{{new Date(prospect.updated_at).toLocaleString('en-us')}}</td>
        <td>

         <a href="" class="btn btn-primary" @click.prevent="openModal(prospect)" >Edit Prospect</a>
        </td>
        </tr>

    </tbody>
<modal modal_title="Edit Restaurant" :modalOpen="state.modalOpen" @close="state.modalOpen = !state.modalOpen" type="update">
    <update-form :prospect="prospectStore.selectedProspect"></update-form>
</modal>
</template>

<script>
import {useProspectStore} from "../../store/ProspectStore";
import {computed, reactive, ref} from "vue";
import Modal from "./TheModal.vue";
import UpdateForm from "../forms/UpdateForm.vue";

export default {
    name: "ProspectList.vue",
    components: {Modal, UpdateForm},
    setup(){
        const prospectStore = useProspectStore();
        const state = reactive({modalOpen: false, selectedProspect: null});
        prospectStore.fetchProspects();
        const openModal = (prospect) => {
            console.log(prospect)
            state.modalOpen = true;
            prospectStore.selectProspect(prospect);
            console.log('SelectedProspect', prospectStore.selectedProspect)
        }
        const prospects = computed(()=> prospectStore.getSortedProspects)

        console.log(prospects)

        return{prospects, openModal, prospectStore, state}
    }
}
</script>

<style scoped>

</style>
