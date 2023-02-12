<template>
  <div>
        <text-field v-model="form.name" :label="'Form name'"></text-field>
        <component v-for="field in form.fields" :key="field.name" :is="getFieldComponent(field.field_type.name)" v-model="field.value" :label="field.field_type.name"></component>
        <div class="grid">
            <button v-on:click="updateForm()">Save</button>
            <button v-on:click="resetForm()">Reset</button>
            <button v-on:click="deleteForm()">Delete</button>
        </div>
        <div class="grid">
            <button v-on:click="goBack()">Back</button>
        </div>
  </div>
</template>

<script>
import TextField from "../components/TextField.vue";
import Amount from "../components/Amount.vue";
import Datepicker from "../components/Datepicker.vue";
import api from "../utils/api";
export default {
    name: "page-view",

    components: {
        TextField,
        Amount,
        Datepicker
    },

    data() {
        return {
            form: [],
            dates: []
        }
    },

    mounted() {
        this.getForm(this.$route.params.id);
    },

    methods: {
        async getForm(id) {
            this.form = await api.getForm(id);
        },

        getFieldComponent(type) {
            if(type == "text") {
                return TextField;
            }
            if(type == "amount") {
                return Amount;
            }
            if(type == "date") {
                return Datepicker;
            }
        },

        async updateForm() {
            this.forms = await api.updateForm(this.form)
            .then(() => {
                this.$router.push('/')
            })
        },

        async resetForm() {
            this.form.fields.forEach(element => {
                element.value = null;
            });
            this.forms = await api.updateForm(this.form);
        },

        async deleteForm() {
            this.forms = await api.deleteForm(this.form.id)
            .then(() => {
                this.$router.push('/')
            })
        },

        goBack() {
            this.$router.push('/');
        }
    }
}
</script>

<style>

</style>