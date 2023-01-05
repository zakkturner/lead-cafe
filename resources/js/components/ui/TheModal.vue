<template>
    <div class="modal" tabindex="-1" role="dialog" v-show="modalOpen">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{modal_title}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="$emit('close')">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <slot />
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="$emit('close')">Close</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" @click="deleteProspect(prospect.id)" v-if="type === 'update'">Delete Prospect</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed} from "vue";
import UpdateForm from "../forms/UpdateForm";
import axios from "axios";
import {useProspectStore} from "../../store/ProspectStore";

export default {
    name: "TheModal",
    components: {UpdateForm},
    props: {
        type: String,
        modalOpen: {
            type: Boolean,
            required: true
        },
        prospect: Object,
        modal_title: String
    },
    setup(props){
        const prospectStore = useProspectStore()
        const prospect = computed(()=> prospectStore.selectedProspect)
        let prospectDisplayed = props.prospect
        const deleteProspect = (id) =>{
            // let restaurantName = prospect.company
            if(confirm("Are you sure you want to delete?")){
                axios.delete('/api/prospects/delete/' + id)
                    .then((response)=> {console.log(response.data)})
                    .then(()=> {

                        prospectStore.fetchProspects()
                    })
                    .catch(err => console.log(err.message))
                    .finally(()=> alert("Prospect was deleted"));
            }
        }

        return {prospectDisplayed, deleteProspect, prospect}
    }


}
</script>

<style scoped>
.modal{
    position: fixed;
    z-index: 999;
    display: block;
    background: rgba(0, 0, 0, 0.5);
}
.modal-dialog{
    background: #fff;
}
</style>
