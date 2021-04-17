<template>
    <div>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <router-link class="nav-link"  to = "/home">Home
                                <span class="sr-only">(current)</span>
                            </router-link>
                        </li>

                        <!-- Navbar dropdowns -->
                        <b-nav-item-dropdown text="VueJS" right>
                            <b-dropdown-item to="/computed-properties">Computed Properties</b-dropdown-item>
                            <b-dropdown-item to="/watch">Vue Watch</b-dropdown-item>
                            <b-dropdown-item to="/binding">Binding</b-dropdown-item>
                            <b-dropdown-item href="#">FA</b-dropdown-item>
                        </b-nav-item-dropdown>

                        <!-- Navbar dropdowns Two-->
                        <b-nav-item-dropdown text="Vue-Demo-Project" right>
                            <b-dropdown-item to="/customer-details">Customer Details</b-dropdown-item>
                            <b-dropdown-item to="/spa">SPA Project</b-dropdown-item>
                            <b-dropdown-item to="/single-form">Single Form Submit</b-dropdown-item>
                            <b-dropdown-item to="/contact-form">Contact Form</b-dropdown-item>
                        </b-nav-item-dropdown>

                        <li class="nav-item">
                            <router-link class="nav-link" to="/about" >About</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/contact">Contact</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
name: "HeaderComponent"
}
</script>

<style scoped>

</style>
