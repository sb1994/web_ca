<template>
  <nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-center">
        <a href="/" class="navbar-brand d-flex w-50 mr-auto">Brand</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar">
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item">
                    <router-link :to="{name:'index'}"  class="nav-link">View Events</router-link>
                </li>
                <li class="nav-item">
                    <router-link :to="{name:'event-create'}"  class="nav-link">Create Event</router-link>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>
export default {

}
</script>

<style>

</style>
