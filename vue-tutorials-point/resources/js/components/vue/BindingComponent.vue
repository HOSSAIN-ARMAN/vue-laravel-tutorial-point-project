<template>
    <div>
        <br>
        In this chapter will learn how to manipulate or assign values to HTML attributes, change the style, and assign classes with the help of binding directive called v-bind available with VueJS.

        Let’s consider an example to understand why we need and when to use v-bind directive for data binding.
        ----------------------
        <hr>
        <br>
<!--        <button @click="isActive= true">Click me</button>-->

<!--        <div class="info" v-bind:class="{active:isActive, displayError:hasError}">-->

        <div class="info" v-bind:class = "[isActive ?  infoClass : '', hasError ? errorClass : '']">
            {{ title }}
        </div>

        <br>

        <new-component class="active"></new-component>
        <new-component v-bind:class="{ active : isActive}"></new-component>
        <br>
        <br>



    </div>
</template>

<script>
export default {
    name: "BindingComponent",

    data () {
        return {
            title:"class bind",
            infoClass: 'info',
            errorClass: 'displayError',
            isActive: true,
            hasError: false
        }
    },

    components : {
        'new-component' : {
            template : '<div class="info">New component binding</div>'
        }
    }
}
</script>

<style scoped>

.info {
    color: #00529B;
    background-color: #BDE5F8;

}
div div {
    margin: 10px 0;
    padding: 12px;
}

.active {
    color: #4F8A10;
    background-color: #DFF2BF;
}
.displayError{
    color: #D8000C;
    background-color: #FFBABA;
}
</style>
