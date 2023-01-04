<template>
    <div class="mt-4">
<!--        <custom-modal :modalOpen="modalOpen" :idprop="id" @modalClose="closeModal"></custom-modal>-->
        <custom-message
            :messageprop="state.message"
            :successprop="state.success"
            :failprop="state.failure"
            v-if="state.showMsg"
        ></custom-message>



        <div class="m1-auto" v-if="prospectStore.selectedProspect !== undefined" >
            <form action="" @submit.prevent="onSubmit" >

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" name="contact" v-model="prospectStore.selectedProspect.contact">
                </div>
                <div class="form-group">
                    <label for="contact">Company *</label>
                    <input type="text" class="form-control" name="company" v-model="prospectStore.selectedProspect.company">
                </div>
                <div class="form-group">
                    <label for="contact">Phone One *</label>
                    <input type="text" class="form-control" name="phone_one" v-model="prospectStore.selectedProspect.phone_one">
                </div>
                <div class="form-group">
                    <label for="contact">Phone Two</label>
                    <input type="text" class="form-control" name="phone_two" v-model="prospectStore.selectedProspect.phone_two">
                </div>
                <div class="form-group">
                    <label for="">Website URL</label>
                    <input type="text" class="form-control" v-model="prospectStore.selectedProspect.website" name="website">
                </div>
                <div class="form-group">
                    <label for="address">Address </label>
                    <input type="text" class="form-control" v-model="prospectStore.selectedProspect.address" name="address">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="prospectStore.selectedProspect.email" name="email">
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" v-model="prospectStore.selectedProspect.position" name="position">
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea cols="5" rows="5" class="form-control" name="notes" v-model="prospectStore.selectedProspect.notes"></textarea>
                </div>
                <div class="d-flex justify-content-end pt-2">
                    <button type="submit" class="btn btn-success">Update Prospect</button>
                </div>


            </form>
        </div>
    </div>

</template>

<script>
import axios from 'axios';
import { useProspectStore } from "../../store/ProspectStore";
import CustomMessage from "../ui/CustomMessage.vue";
import {computed, reactive, ref, toRefs} from "vue";
export default {
    components: {CustomMessage},
    props: ['prospect'],

    setup(props){
        const prospectStore = useProspectStore();
        // const prospect = prospectStore.selectedProspect;
        // const { prospect } = toRefs(props)
        // console.log (prospect.id)
        const state = reactive({
            edit: false,
            showMsg:false,
            message: '',
            success: false,
            failure: false,

        })

        // console.log( 'Prospect', props.prospect);

      const onSubmit = (e) => {


            axios.put(`/api/prospects/update/${prospectStore.selectedProspect.id}`, prospectStore.selectedProspect)
                .then(response => {
                        state.message = response.data;
                        state.showMsg = true;
                        state.success = true;
                        state.failure = false;
                        setTimeout(() => {
                            state.edit = false;
                        }, 500)
                    }
                ).catch((err) => {

                    state.message = err.message;
                    state.showMsg = true
                    state.success = false;
                    state.failure = true
                    setTimeout(() => {
                        state.edit = false;
                    }, 500)

                }
            ).finally(()=>{
                setTimeout(()=>{
                    state.showMsg = false;
                    state.success = false;
                    state.message = ''
                },4000)
                // this.$forceUpdate();
                prospectStore.fetchProspects();

            })


        }

        // const closeModal = () =>{
        //     this.prospectStore.selectedProspect = undefined
        //     this.modalOpen = false;
        // }

        return {
          state,
            onSubmit, prospectStore }
    },



}
</script>

<style scoped>
.list-group-item {
    display: flex;
    flex-direction: column;
}
</style>
