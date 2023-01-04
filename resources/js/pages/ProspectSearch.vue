<template>
    <base-layout>
        <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Search for Prospects</h1>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/prospects">Back to Dashboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <custom-message
                    :messageprop="message.text" :successprop="message.success"
                    :failprop="message.failure" v-if="message.showMsg"></custom-message>
                <search-form></search-form>
                <div class="ml-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Name of Restaurant</th>
                                <th>Address</th>
                                <th>Tel 1</th>
                                <th>Description</th>
                                <th>Website</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="results" v-for="result in results">
                                <td v-if="result.thumbnail"><img  class="img-thumbnail" alt="thumbnail" :src="result.thumbnail" width="100px" height="100px" /> </td>
                                <td v-else>No Image</td>
                                <td>{{result.title}}</td>
                                <td v-if="result.address">{{result.address}}</td>
                                <td v-else>No address</td>
                                <td v-if="result.phone">{{result.phone}}</td>
                                <td v-else>No phone</td>
                                <td v-if="result.type">{{result.type}}</td>
                                <td v-else>No types</td>
                                <td v-if="result.website">{{result.website}}</td>
                                <td v-else>No website</td>
                                <td>
                                    <custom-button :title="'Add Prospect'" :prospect="result"></custom-button>
                                </td>
                            </tr>
                            <tr v-else>No results. Please Enter New Query</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </base-layout>

</template>

<script>
import CustomButton from "../components/ui/CustomButton.vue";
import SearchForm from "../components/forms/SearchForm.vue";
import CustomMessage from "../components/ui/CustomMessage.vue";
import {useSearchStore} from "../store/SearchStore";
import {computed} from "vue";
import BaseLayout from "../components/template/BaseLayout.vue";


export default {
    name: "ProspectSearch",
    components: {BaseLayout, SearchForm, CustomButton, CustomMessage},
    setup(){
        const searchStore = useSearchStore();
        const messageState = computed(()=> searchStore.getMessageState);
        const message = messageState.value;
        message.success = true
        const results = computed(() => searchStore.getGoogleResults);

        return{ results, message}

    }

}
</script>

<style scoped>
.img-thumbnail{
    width: 50px;
    height: 50px;
}
</style>
