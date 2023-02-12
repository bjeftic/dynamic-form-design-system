<template>
  <div class="grid">
    <label for="field">
        {{label}}
        <div class="grid">
    <input type="text" name="field" v-model="inputVal">
    <select v-model="suffixValue">
        <option v-for="suffix in suffixes" :key="suffix.id" :value="suffix.value">{{suffix.id}}</option>
    </select>
        </div>
    </label>
  </div>
</template>

<script>
export default {
    name: "amount-field",

    props: ['value', 'label'],

    data() {
        return {
            suffixValue: null,
            suffixes: [
                {id: 'K', value: 1000},
                {id: 'M', value: 1000000},
                {id: 'B', value: 1000000000},
            ]
        }
    },

    computed: {
        inputVal: {
            get() {
                var calc = [0, 0]
                if(this.value > 0) {
                    calc = this.preCalcAmount(this.value)
                } else  {
                    calc = [0, 0]
                }
                this.suffixValue = calc[1];
                return calc[0];
            },
            set(val) {
                this.$emit('input', val);
            }
        }
    },

    watch: {
        'suffixValue': function () {
            this.calcValue();
        }
    },

    methods: {
        preCalcAmount(val) {
            if((val / 1000000000) > 1) {
                return [(val / 1000000000), 1000000000];
            } else if ((val / 1000000) > 1) {
                return [(val / 1000000), 1000000];
            } else if ((val / 1000) > 1) {
                return [(val / 1000), 1000];
            }
        },

        calcValue() {
            this.inputVal = this.inputVal * this.suffixValue;
        }
    },
}
</script>

<style>

</style>