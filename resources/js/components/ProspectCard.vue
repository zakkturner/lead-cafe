<template>
    <div class="card mt-4">
        <div class="card-header d-flex justify-content-between">
            View {{ company }}
            <div class="m1-auto">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">All Prospects</a></li>
                        <li @click="edit = ! edit">
                            <a class="dropdown-item" href="#" v-if="!edit" >Edit Prospect</a>
                            <a class="dropdown-item" href="#" v-else>Show Prospect</a>
                        </li>

                        <li><a class="dropdown-item" href="#">Delete Prospect</a></li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="m1-auto" v-if="!edit">

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <strong>Contact: </strong>

                    {{ contact }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Company:
                    </strong>
                    {{ company }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Phone One:
                    </strong>
                    {{ phone_one }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Phone Two:
                    </strong>
                    {{ phone_two }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Address
                    </strong>
                    <address>
                        {{ address }}
                    </address>
                </li>
                <li class="list-group-item">
                    <strong>
                        Website:
                    </strong>
                    {{ web_url }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Email:
                    </strong>
                    {{ email }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Position:
                    </strong>
                    {{ position }}
                </li>
                <li class="list-group-item">
                    <strong>
                        Notes:
                    </strong>
                    {{ notes }}
                </li>
            </ul>

        </div>
        <div class="m1-auto" v-else>
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="contact">Contact</label>
                    <input type="text" class="form-control" name="contact">
                </div>
                <div class="form-group">
                    <label for="contact">Company *</label>
                    <input type="text" class="form-control" name="company">
                </div>
                <div class="form-group">
                    <label for="contact">Phone One *</label>
                    <input type="text" class="form-control" name="phone_one">
                </div>
                <div class="form-group">
                    <label for="contact">Phone Two</label>
                    <input type="text" class="form-control" name="phone_two">
                </div>
                <div class="form-group">
                    <label for="contact">Website URL</label>
                    <input type="text" class="form-control" name="web_url">
                </div>
                <div class="form-group">
                    <label for="contact">Address *</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="form-group">
                    <label for="contact">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="contact">Position</label>
                    <input type="text" class="form-control" name="position">
                </div>
                <div class="form-group">
                    <label for="contact">Notes</label>
                    <textarea cols="5" rows="5" class="form-control" name="notes"></textarea>
                </div>
                <div class="d-flex justify-content-end pt-2">
                    <button type="submit" class="btn btn-success">Create Prospect</button>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            edit: false
        }
    },

    props: ['contact', 'company', 'phone_one', 'phone_two', 'address', 'web_url', 'email', 'position', 'notes'],
}
</script>

<style scoped>
.list-group-item {
    display: flex;
    flex-direction: column;
}
</style>
