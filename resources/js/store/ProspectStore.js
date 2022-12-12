import { defineStore } from "pinia";
import axios from "axios";

export const useProspectStore = defineStore("prospects", {
    state() {
        return {
            prospects: [],
        };
    },
    getters: {
        getProspects: (state) => state.prospects,
        getProspect: (state) => state.prospects,
        // getLoadingState: (state) => state.isLoading,
    },
    actions: {
        async fetchProspects() {
            try {
                const data = await axios.get(
                    "http://localhost:8000/api/prospects/all"
                );
                this.prospects = data.data;
                // this.isLoading = false;
            } catch (error) {
                alert(error);
                console.log(error);
            }
        },
        // async fetchAsset(id : string | string[]){
        //     try {
        //         console.log(id)
        //         const data = await axios.get(`http://localhost:8000/api/asset/${id}`);
        //         this.asset = data.data
        //         this.isLoading = false;
        //         console.log(this.asset)
        //     }
        //     catch (error) {
        //         alert(error)
        //         console.log(error)
        //     }
        // }
    },
});
