import { defineStore } from "pinia";
import axios from "axios";



export const useSearchStore = defineStore("search", {
    state() {
        return {
            results: [],
            message: {
                text: '',
                showMsg: false,
                success: false,
                fail: false
            }
        };
    },
    getters: {
        getGoogleResults: (state) => state.results,
        getMessageState: (state) => state.message
    },
    actions: {
        async fetchProspects() {
            try {
                const data = await axios.get(
                    "/api/prospects/all"
                );
                this.prospects = data.data;
            } catch (error) {
                alert(error);
                console.log(error);
            }
        },
        async searchGoogleProspects(query){
            try {
                /** @namespace results **/
                const data = await axios.get(`/api/prospects/search/?query=${query}`);
                this.results = data.data
            }
            catch (error) {
                alert(error)
                console.log(error)
            }
        },


    },
});
