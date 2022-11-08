<template>
    <div class="card mt-4">
        <custom-modal :modalOpen="modalOpen" :idprop="id" @modalClose="closeModal"></custom-modal>
        <custom-message
            :messageprop="message"
            :successprop="success"
            :failprop="failure"
            v-if="showMsg"
        ></custom-message>
        <div class="card-header d-flex justify-content-between">
            View {{ company }}
            <div class="m1-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">All Prospects</a></li>
                        <li @click="edit = ! edit">
                            <button class="dropdown-item"  v-if="!edit">Edit Prospect</button>
                            <a class="dropdown-item" href="#" v-else>Show Prospect</a>
                        </li>

                        <li><p class="dropdown-item" @click="modalOpen = true">Delete Prospect</p></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="m1-auto" v-if="!edit">

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Contact: </strong>

                    {{ contact }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Company:
                    </strong>
                    {{ company }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Phone One:
                    </strong>
                    {{ phone_one }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Phone Two:
                    </strong>
                    {{ phone_two }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Address
                    </strong>
                    <address>
                        {{ address }}
                    </address>
                </li>
                <li class="list-group-item">
                    <strong>
                        Website:
                    </strong>
                    {{ website }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Email:
                    </strong>
                    {{ email }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Position:
                    </strong>
                    {{ position }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Notes:
                    </strong>
                    {{ notes }}
                </li>
            </ul>

        </div>
        <div class="m1-auto" v-else>
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
export default {

    props: ['idprop', 'contactprop', 'companyprop', 'phone_oneprop', 'phone_twoprop', 'addressprop', 'websiteprop', 'emailprop', 'positionprop', 'notesprop'],

    data() {
        return {
            edit: false,
            showMsg: false,
            message: '',
            success: false,
            failure: false,
            id: this.idprop,
            contact: this.contactprop,
            company: this.companyprop,
            phone_one: this.phone_oneprop,
            phone_two: this.phone_twoprop,
            address: this.addressprop,
            website: this.websiteprop,
            email: this.emailprop,
            position: this.positionprop,
            notes: this.notesprop,
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
            axios.put(`/prospects/update/${this.id}`, prospectUpdate)
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
