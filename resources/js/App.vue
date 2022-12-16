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
                                data-bs-toggle="dropdown" aria-expanded="false">
                            Actions
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Create
                                Prospect</a></li>
                            <li><a class="dropdown-item" href="">Download as Excel</a></li>
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
    </main>

<!--<main class="prospects-container">-->
<!--    <prospect-list></prospect-list>-->
<!--</main>-->
</template>

<script>
import ProspectList from "./components/ProspectList";
import Sidebar from "./components/layout/Sidebar";
export default {
    name: "App.vue",
    components: {Sidebar, ProspectList },
    setup(){}

}
</script>

<style scoped>

</style>
