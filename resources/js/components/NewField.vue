<template>
  <div class="grid">
    <input type="text" name="text" v-model="inputVal.value">
    <select v-model="inputVal.name">
        <option v-for="fieldType in fieldTypes" :key="fieldType.id" :value="fieldType.id">{{fieldType.name}}</option>
    </select>
    <button v-on:click="remove()">x</button>
  </div>
</template>

<script>
import Index from '../pages/Index.vue';
import TextField from './TextField.vue';
export default {
  components: { TextField, Index },
    name: "new-field",

    props: ['value', 'fieldTypes'],

    computed: {
        inputVal: {
            get() {
                return this.value;
            },
            set(val) {
                this.$emit('input', val);
            }
        }
    },

    methods: {
        remove() {
            this.$emit('remove');
        },
    },  
}
</script>

<style>

</style>