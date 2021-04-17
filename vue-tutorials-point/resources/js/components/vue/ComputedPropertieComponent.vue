<template>
<div>
    <div class="computed_props_part_one">
        <br>
        <b>computed_propertise_part_one</b>
         <br>
            <input type="text" v-model="fullName">
            <h4>{{ firstName }}</h4>
            <h4>{{ lastName }}</h4>
        <br>
    </div>

</div>
</template>

<script>
export default {
name: "computedPropertieComponent",
    data() {
       return {
           firstName:"alyea",
           lastName :"Khan"
       }
    },

    methods: {

    },

    computed: {
        fullName : {
            get: function () {
                return this.firstName+ " " +this.lastName
            },
            set: function (name) {
                var fName = name.split(" ");
                this.firstName = fName[0];
                this.lastName  = fName[1];

            }
        }
    }
}
</script>

<style scoped>

</style>
