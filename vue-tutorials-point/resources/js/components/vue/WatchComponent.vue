<template>
<div>
    <h4> this vue watch component</h4>
    <br>
    Kilometers: <input type="text" v-model="kilometers">
    Meters: <input type="text" v-model="meters">
    <br>
    <br>
    <br>
</div>
</template>

<script>
export default {
name: "WatchComponent",

    data() {
      return {
          kilometers: 0,
          meters: 0
      }
    },
    methods: {

    },
    computed: {

    },
    watch: {
        kilometers: function (val) {
          this.kilometers = val;
          this.meters = val * 1000;
        },
        meters: function (val) {
          this.kilometers = val/1000;
          this.meters = val;
        }
    }
}
</script>

<style scoped>

</style>
