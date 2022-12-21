<template>
    <div class="mt-4">
<!--        <custom-modal :modalOpen="modalOpen" :idprop="id" @modalClose="closeModal"></custom-modal>-->
<!--        <custom-message-->
<!--            :messageprop="message"-->
<!--            :successprop="success"-->
<!--            :failprop="failure"-->
<!--            v-if="showMsg"-->
<!--        ></custom-message>-->




        <div class="m1-auto" >
            <form action="" @submit.prevent="onSubmit">

                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" name="contact" v-model="contact">
                </div>
                <div class="form-group">
                    <label for="contact">Company *</label>
                    <input type="text" class="form-control" name="company" v-model="company">
                </div>
                <div class="form-group">
                    <label for="contact">Phone One *</label>
                    <input type="text" class="form-control" name="phone_one" v-model="phone_one">
                </div>
                <div class="form-group">
                    <label for="contact">Phone Two</label>
                    <input type="text" class="form-control" name="phone_two" v-model="phone_two">
                </div>
                <div class="form-group">
                    <label for="">Website URL</label>
                    <input type="text" class="form-control" v-model="website" name="website">
                </div>
                <div class="form-group">
                    <label for="address">Address </label>
                    <input type="text" class="form-control" v-model="address" name="address">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="email" name="email">
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" v-model="position" name="position">
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea cols="5" rows="5" class="form-control" name="notes" v-model="notes"></textarea>
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
export default {

    props: ['prospect'],

    data() {
        return {
            edit: false,
            showMsg: false,
            message: '',
            success: false,
            failure: false,
            id: this.prospect.id,
            contact: this.prospect.contact,
            company: this.prospect.company,
            phone_one: this.prospect.phone_one,
            phone_two: this.prospect.phone_two,
            address: this.prospect.address,
            website: this.prospect.website,
            email: this.prospect.email,
            position: this.prospect.position,
            notes: this.prospect.notes,
            modalOpen: false
        }

    },
    methods: {
        onSubmit(e) {
            const prospectUpdate = {

                contact: this.contact,
                company: this.company,
                phone_one: this.phone_one,
                phone_two: this.phone_two,
                address: this.address,
                website: this.website,
                email: this.email,
                position: this.position,
                notes: this.notes
            }
            console.log(prospectUpdate)
            axios.put(`/api/prospects/update/${this.id}`, prospectUpdate)
                .then(response => {
                        this.message = response.data;
                        this.showMsg = true;
                        this.success = true;
                        this.failure = false;
                        setTimeout(() => {
                            this.edit = false;
                        }, 500)
                    }
                ).catch((err) => {

                    this.message = err.message;
                    this.showMsg = true
                    this.success = false;
                    this.failure = true
                    setTimeout(() => {
                        this.edit = false;
                    }, 500)

                }
            )


        },
        closeModal(){
            this.modalOpen = false;
        }
    }
}
</script>

<style scoped>
.list-group-item {
    display: flex;
    flex-direction: column;
}
</style>
