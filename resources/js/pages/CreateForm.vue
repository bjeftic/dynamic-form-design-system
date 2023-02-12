<template>
    <div>
                <text-field v-model="form.name" id="form-name" :label="'Form name'"></text-field>
                    <component v-for="field in form.fields" :key="field.id" :is="getFieldComponent(field.name)" v-model="field.value" :label="field.name"></component>
            <label for="form-name">
                    Add field
                <div class="grid">
                    <select v-model="selectedFieldType">
                        <option v-for="fieldType in fieldTypes" :key="fieldType.id" :value="fieldType.name">{{fieldType.name}}</option>
                    </select>
                    <button v-on:click="addField(selectedFieldType)">Add field</button>
                </div>
            </label>
            <div class="grid">
                <button v-on:click="saveForm()">Save</button>
                <button v-on:click="goBack()">Back</button>
            </div>
    </div>
</template>

<script>
import NewField from "../components/NewField.vue";
import TextField from "../components/TextField.vue";
import Amount from "../components/Amount.vue";
import Datepicker from "../components/Datepicker.vue";
import api from "../utils/api";
export default {
    name: "create-form",

    components: {
        TextField,
        NewField,
        Amount,
        Datepicker
    },

    data() {
        return {
            fieldTypes: [],
            selectedFieldType: null,
            form: {
                name: '',
                fields: []
            }
        }
    },

    mounted() {
        this.getFieldTypes()
    },

    methods: {
        addField(fieldType) {
            this.form.fields.push({name: fieldType, value: null})
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

        async getFieldTypes() {
            this.fieldTypes = await api.getFieldTypes();
        },

        async saveForm() {
            await api.createForm(this.form)
            .then(() => {
                this.$router.push('/')
            })
        },

        goBack() {
            this.$router.push('/');
        }
    },

}
</script>

<style>

</style>