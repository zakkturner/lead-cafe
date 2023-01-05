import { defineStore } from "pinia";
import axios from "axios";

export const useProspectStore = defineStore("prospects", {
    state() {
        return {
            prospects: [],
            selectedProspect:undefined,
            currentSort: 'created_at',
            currentSortDir: 'desc',
            //Pagination state
            pageSize: 10,
            currentPage: 1,
            //searchState
            // enteredSearchQuery: false


        };
    },
    getters: {
        getProspects: (state) => state.prospects,
        getSelectedProspect: (state) => state.selectedProspect,
        getSortedProspects: (state) =>{
            return state.prospects.sort((a,b) =>{
                let modifier = 1;
                if(state.currentSortDir === 'desc') modifier = -1;
                if(a[state.currentSort] < b [state.currentSort]) return -1 * modifier;
                if(a[state.currentSort] > b[state.currentSort]) return 1 * modifier;
                return 0;

            }).filter((row, index) => {
                let start = (state.currentPage-1)*state.pageSize;
                let end = state.currentPage*state.pageSize;
                if(index >= start && index < end) return true;
            });
        },
        getPageAmount: (state) => Math.round(state.prospects.length / state.pageSize),
        getCurrentPage: (state) => state.currentPage,
        // getIfEnteredSearchQuery:(state) => state.enteredSearchQuery
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
        async fetchProspect(searchQuery){
            try {
                const data = await axios.get(`/api/prospects/filter/?search=${searchQuery}`);
                this.prospects = data.data
            }
            catch (error) {
                alert(error)
                console.log(error)
            }
        },
        selectProspect(prospect){
            this.selectedProspect = prospect
        },
        sort: function(s){
            if(s ===  this.currentSort){
                this.currentSortDir = this.currentSortDir==='asc'?'desc' : 'asc';
            }
            this.currentSort = s;
        },
        nextPage:function() {
            if((this.currentPage*this.pageSize) < this.prospects.length) this.currentPage++
        },
        prevPage: function(){
            if(this.currentPage > 1) this.currentPage--;
        },
        jumpToPage: function(newPageNum){
            this.currentPage = newPageNum
        }

    },
});
