<template>
    <th @click="prospectStore.sort(name)">
        <slot />
        <div class="arrow-container" v-if="prospectStore.currentSort === name">
            <font-awesome-icon icon="fa-solid fa-angle-down"  v-if="prospectStore.currentSortDir === 'desc'"/>
            <font-awesome-icon icon="fa-solid fa-angle-up"  v-else/>
        </div>

    </th>
<!--    Debug current Sort -->
<!--    debug {{ prospectStore.currentSort}} {{ prospectStore.currentSortDir}}-->
</template>


<script>


import {useProspectStore} from "../../store/ProspectStore";

export default {
    name: "SortComponent",
    props: ['name'],

    // components: {FontAwesomeIcon},

    setup(props){
        const prospectStore = useProspectStore();
       // console.log(props.name)

        return{ prospectStore}

    }
}
</script>

<style scoped>

</style>
