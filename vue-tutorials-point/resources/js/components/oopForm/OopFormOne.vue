<template>
<div class="container">
    <br>
    <br>
    <form action="#" @submit.prevent="onsubmit()">
        <div class="form-group">
            <label>project name</label>
            <input type="text" name="project_name" v-model="oopform.project_name" class="form-control">
<!--            <span v-text="errors.get('project_name')"></span>-->

        </div>
        <div class="form-group">
            <label>project description</label>
            <input type="text" name="descrption" v-model="oopform.descrption" class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="btn" class="btn btn-primary" value="create">
        </div>
    </form>
</div>
</template>

<script>


export default {

name: "oopFormOne",
    data () {
      return {
          errors : new Errors(),
          oopform:{
              project_name: '',
              descrption: ''
          }
      }
    },

    methods: {
        onsubmit: function () {
            let self = this;
            let params =Object.assign({}, self.oopform);
            axios.post('api/oop-form-one', params).then(response => {
                alert('sucsess');
            }).catch(error => {
                // alert(error);

            });
        }
    }
}
</script>

<style scoped>

</style>
