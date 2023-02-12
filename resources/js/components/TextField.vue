<template>
  <div>
    <label for="field">
        {{label}}
    <input type="text" name="field" v-model="inputVal">
    </label>
  </div>
</template>

<script>
export default {
    name: "text-field",

    props: ['value', 'label'],

    computed: {
        inputVal: {
            get() {
                return this.value;
            },
            set(val) {
                this.$emit('input', val);
            }
        }
    }
}
</script>

<style>

</style>