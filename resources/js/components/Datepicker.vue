<template>
  <div>
    <label for="field">
        {{label}}
    <input type="text" ref="picker" name="field" v-model="inputVal"/>
    </label>
  </div>
</template>

<script>
export default {
    name: "datepicker-field",

    props: ['value', 'label'],

    mounted() {
        flatpickr(this.$refs.picker, {
            dateFormat: "Y-m-d",
        });
    },

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