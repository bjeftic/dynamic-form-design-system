<template>
  <div>
    <h1>Form control center</h1>
    <div class="grid">
        <article v-for="form in forms" :key="form.id">
            <header>{{form.name}}</header>
            This form contains {{form.fields.length}} fields.
            <footer>
            <div class="grid">
                <router-link role="button" :to="'/view-form/' + form.id">View</router-link>
            </div>
            </footer>
        </article>
    </div>
    <div class="grid">
        <router-link role="button" to="/create-form">Create new form</router-link>
    </div>
  </div>
</template>

<script>
import api from "../utils/api";
export default {
    name: 'page-index',

    data() {
        return {
            forms: []
        }
    },

    mounted() {
        this.getAllForms();
    },

    methods: {
        async getAllForms() {
            this.forms = await api.getAllForms();
        },
    },
}
</script>

<style>

</style>