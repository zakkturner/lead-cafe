<template>
    <main class="d-flex">

        <sidebar></sidebar>
        <div class="card mt-4 w-60 ms-2">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Prospects <small class="text-muted">Showing All Prospects</small></h1>


                    <div class="m1-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    @click.prevent="state.isActive = !state.isActive"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="custom-dropdown-menu" v-if="state.isActive">
                                <li><a class="dropdown-item" @click.prevent="openModal">Create
                                    Prospect</a></li>
                                <li><a class="dropdown-item" @click.prevent="downloadExcel">Download as Excel</a></li>
                            </ul>
                        </div>
                    </div>
                </div>





                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>Notes</th>
                        <th>Name of Restaurant</th>
                        <th>Address</th>
                        <th>Tel 1</th>
                        <th>Tel 2</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Contact</th>
                        <th>Position</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <prospect-list></prospect-list>
                </table>


            </div>
        </div>
        <the-modal >
            <create-form></create-form>
        </the-modal>
    </main>
</template>
<script>

import ProspectList from '../components/ProspectList'
import Sidebar from "../components/layout/Sidebar.vue";
import Modal from "../components/layout/TheModal";
import {reactive} from "vue";
import axios from "axios";
import TheModal from "../components/layout/TheModal";
import CreateForm from "../components/forms/CreateForm";
export default {
    components: {CreateForm, TheModal, Modal, ProspectList, Sidebar},
    setup(){
        const state = reactive({
            isActive: false,
            modalOpen: false
        })
        const openModal = () => {
            state.modalOpen = true;

        }
        const downloadExcel = () =>{
            console.log('works');
            axios.get('http://localhost:8000/api/prospects/prospects_export').then(response => {
                let fileURL = window.URL.createObjectURL(new Blob([response.data]));
                let fileLink = document.createElement('a');
                fileLink.href = fileURL;
                fileLink.setAttribute('download', 'prospects.xlsx');
                document.body.appendChild(fileLink);
                fileLink.click();
            })
        }

        return { state, downloadExcel }
    }


}
</script>
<style>
.custom-dropdown-menu{
    --bs-dropdown-zindex: 1000;
    --bs-dropdown-min-width: 10rem;
    --bs-dropdown-padding-x: 0;
    --bs-dropdown-padding-y: 0.5rem;
    --bs-dropdown-spacer: 0.125rem;
    --bs-dropdown-font-size: 0.9rem;
    --bs-dropdown-color: #212529;
    --bs-dropdown-bg: #fff;
    --bs-dropdown-border-color: var(--bs-border-color-translucent);
    --bs-dropdown-border-radius: 0.375rem;
    --bs-dropdown-border-width: 1px;
    --bs-dropdown-inner-border-radius: calc(0.375rem - 1px);
    --bs-dropdown-divider-bg: var(--bs-border-color-translucent);
    --bs-dropdown-divider-margin-y: 0.5rem;
    --bs-dropdown-box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    --bs-dropdown-link-color: #212529;
    --bs-dropdown-link-hover-color: #1e2125;
    --bs-dropdown-link-hover-bg: #e9ecef;
    --bs-dropdown-link-active-color: #fff;
    --bs-dropdown-link-active-bg: #0d6efd;
    --bs-dropdown-link-disabled-color: #adb5bd;
    --bs-dropdown-item-padding-x: 1rem;
    --bs-dropdown-item-padding-y: 0.25rem;
    --bs-dropdown-header-color: #6c757d;
    --bs-dropdown-header-padding-x: 1rem;
    --bs-dropdown-header-padding-y: 0.5rem;
    position: absolute;
    z-index: var(--bs-dropdown-zindex);
    min-width: var(--bs-dropdown-min-width);
    padding: var(--bs-dropdown-padding-y) var(--bs-dropdown-padding-x);
    margin: 0;
    font-size: var(--bs-dropdown-font-size);
    color: var(--bs-dropdown-color);
    text-align: left;
    list-style: none;
    background-color: var(--bs-dropdown-bg);
    background-clip: padding-box;
    border: var(--bs-dropdown-border-width) solid var(--bs-dropdown-border-color);
    border-radius: var(--bs-dropdown-border-radius);
    right: 0;
}
</style>
