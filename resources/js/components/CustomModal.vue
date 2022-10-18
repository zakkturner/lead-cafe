<template>
    <div class="modal" tabindex="-1" :class="{'modal-open':modalOpen}" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure you want to delete?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>This cannot be undone!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="$emit(modalOpen = false)">Close</button>
                    <button type="button" class="btn btn-danger" @click="deleteRequest">Delete Prospect</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['modalOpen', 'idprop'],
    emits: ['modalClose'],
    data() {
        return {

            id: this.idprop,
            deleted: false
        }

    },
    methods: {
        deleteRequest: function(){
           axios.delete('/prospects/delete/' +  this.id)
               .then((response)=> {console.log(response.data)})
               .then(()=> {
                   this.$emit('modalClose')
                   window.location.href = "/prospects"
               })
               .catch(err => console.log(err.message));
        }
    }
}
</script>

<style scoped>
.modal-header {
    background: #6a1a21;
    color: #ffffff;
}
.modal-open{
    display: flex;
}
</style>
