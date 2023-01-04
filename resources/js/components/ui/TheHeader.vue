<template>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/">
                Lead Cafe
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a href="/" class="nav-link">
                            Manage Prospects
                        </a>




                    </li>
                    <li class="nav-item">



                        <a href="/prospects/search" class="nav-link">
                            Search Prospects
                        </a>

                    </li>

                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    name: "TheHeader"
}
</script>

<style scoped>

</style>
