<template>
    <div class="container">
        <div class="card mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h1>Create Prospect</h1>
                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Actions
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Dashboard</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>


                <form >
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
                        <input type="text" class="form-control" name="website">
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

    </div>
</template>

<script>
export default {
    name: "CreateForm"
}
</script>

<style scoped>

</style>
