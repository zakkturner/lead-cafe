<template>
    <div class="container">
        <div class=" mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Create Prospect</h1>

                </div>
                <hr>
                <custom-message
                    :messageprop="state.message"
                    :successprop="state.success"
                    :failprop="state.failure"
                    v-if="state.showMsg"
                ></custom-message>


                <form >
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" name="contact" v-model="state.formData.contact">
                    </div>
                    <div class="form-group">
                        <label for="contact">Company *</label>
                        <input type="text" class="form-control" name="company" v-model="state.formData.company">
                    </div>
                    <div class="form-group">
                        <label for="contact">Phone One *</label>
                        <input type="text" class="form-control" name="phone_one" v-model="state.formData.phone_one">
                    </div>
                    <div class="form-group">
                        <label for="contact">Phone Two</label>
                        <input type="text" class="form-control" name="phone_two" v-model="state.formData.phone_two">
                    </div>
                    <div class="form-group">
                        <label for="contact">Website URL</label>
                        <input type="text" class="form-control" name="website" v-model="state.formData.website">
                    </div>
                    <div class="form-group">
                        <label for="contact">Address *</label>
                        <input type="text" class="form-control" name="address" v-model="state.formData.address">
                    </div>
                    <div class="form-group">
                        <label for="contact">Email</label>
                        <input type="email" class="form-control" name="email" v-model="state.formData.email">
                    </div>
                    <div class="form-group">
                        <label for="contact">Position</label>
                        <input type="text" class="form-control" name="position" v-model="state.formData.position">
                    </div>
                    <div class="form-group">
                        <label for="contact">Notes</label>
                        <textarea cols="5" rows="5" class="form-control" name="notes" v-model="state.formData.notes"></textarea>
                    </div>
                    <div class="d-flex justify-content-end pt-2">
                        <button type="submit" class="btn btn-success" @click.prevent="saveProspect">Create Prospect</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
import {reactive} from "vue";
import axios from "axios";
import CustomMessage from "../ui/CustomMessage.vue";
export default {
    name: "CreateForm",
    components: {CustomMessage},
    setup(){
        const state = reactive({
            formData: {
                company: '',
                contact: '',
                phone_one: '',
                phone_two: '',
                website: '',
                address: '',
                email: '',
                position: '',
                notes: '',
            },
            showMsg: false,
            message: '',
            success: false,
            failure: false,
        })

        const saveProspect = () =>{
            axios.post('/api/prospects/create', state.formData)
                .then(response =>{
                    state.message = response.data;
                    state.showMsg = true;
                    state.success = true;
                    state.failure = false;
                })
                .catch((err)=>{console.log(err)})
                .finally(

                )
        }
        return {state, saveProspect}
    }
}
</script>

<style scoped>

</style>
