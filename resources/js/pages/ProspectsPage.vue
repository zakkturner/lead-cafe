<template>
    <base-layout>

    <main class="d-flex flex-column ">

        <div class="card mt-4 w-60 ms-2">
            <div class="card-body overflow-auto">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Prospects <small class="text-muted"> Page: {{currentPage}}</small></h1>
                    <pagination></pagination>
                    <search-filter></search-filter>
                    <div class="m1-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    @click.prevent="state.isActive = !state.isActive"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="custom-dropdown-menu" v-if="state.isActive">
                                <li><a class="dropdown-item" href="/prospects/search"> Search for Prospects</a></li>
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
                        <sort-component name="company">Name of Restaurant</sort-component>
                        <th>Address</th>
                        <th>Tel 1</th>
                        <th>Tel 2</th>
                        <th>Email</th>
                        <th>Website</th>
                        <sort-component name="contact">Contact</sort-component>
                        <th>Position</th>
                        <sort-component name="created_at">Last Updated</sort-component>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <prospect-list></prospect-list>
                </table>


            </div>
        </div>
        <the-modal :modalOpen="state.modalOpen" @close="state.modalOpen = !state.modalOpen" type="create">
            <create-form></create-form>
        </the-modal>
    </main>
    </base-layout>
        
</template>
<script>

import ProspectList from '../components/ui/ProspectList.vue'
import Sidebar from "../components/ui/Sidebar.vue";
import Modal from "../components/ui/TheModal";
import {computed, reactive} from "vue";
import axios from "axios";
import TheModal from "../components/ui/TheModal";
import CreateForm from "../components/forms/CreateForm";
import SortComponent from "../components/ui/SortComponent.vue";
import Pagination from "../components/ui/Pagination.vue";
import SearchFilter from "../components/filters/SearchFilter.vue";
import BaseLayout from "../components/template/BaseLayout.vue";

import {useProspectStore} from "../store/ProspectStore";



export default {
    components: {SearchFilter, Pagination, CreateForm, TheModal, Modal, ProspectList, Sidebar, SortComponent, BaseLayout},
    setup(){
        const state = reactive({
            isActive: false,
            modalOpen: false,
            isEmpty: true
        })
        const openModal = () => {
            console.log('works')
            state.modalOpen = true;

        }
        const prospectStore = useProspectStore()
        const currentPage = computed(() => prospectStore.getCurrentPage)


        const downloadExcel = () =>{
            axios.get('http://localhost:8000/api/prospects/prospects_export').then(response => {
                let fileURL = window.URL.createObjectURL(new Blob([response.data]));
                let fileLink = document.createElement('a');
                fileLink.href = fileURL;
                fileLink.setAttribute('download', 'prospects.xlsx');
                document.body.appendChild(fileLink);
                fileLink.click();
            })
        }

        return { state, downloadExcel, openModal, currentPage}
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
