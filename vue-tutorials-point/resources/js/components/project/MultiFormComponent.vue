<template>
<div class="container">
    <br>
    <br>
    <h1>Submit MultiForm</h1>
    <span v-for="error in errors" class="error"> {{ error }}</span>

    <form action="#"  @submit.prevent="store()">

    <div class="form-group" v-if="step == 1">
        <b>Step One</b>
        <input v-model="form.name" type="text" placeholder="Enter your name" class="form-control">
    </div>
    <div class="form-group" v-if="step == 2">
        <b>Step Two</b>
        <input v-model="form.phone" type="tel" placeholder="Enter your mobile Number" class="form-control">

        <input v-model="form.email" type="email" placeholder="Enter your Email address" class="form-control">
    </div>
    <div class="form-group" v-if="step == 3">
        <b>Step Three</b>
        <textarea v-model="form.message" placeholder="enter details" class="form-control">
        </textarea>
    </div>

    <br>
    <p v-if="step != 1"  @click="prevStep" class="btn btn-secondary">Previous</p>
    <p v-if="step != totalStep"  @click="nextStep" class="btn btn-primary">Next Step</p>
    <button v-if="step == totalStep" type="submit" @click="sendQuery" class="btn btn-outline-success btn-sm" id="btn">Save</button>
<!--    <p v-if="step == totalStep" type="submit" class="btn btn-outline-success">Save</p>-->
    </form>
    <br>
    <br>
    Table
    <table>
        <tr v-for="user in users">
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
<!--            <td>{{ user.stepOne().name }}</td>-->
        </tr>
    </table>
</div>
</template>

<script>
export default {
name: "MultiFormComponent",
    data() {
      return {
          step: 1,
          totalStep: 3,
          errors: null,

          users: [],

          form: {
              name: null,
              email: null,
              phone: null,
              message: null
          }
      }
    },

    mounted:function () {
      this.fetch();
    },
    methods: {
        nextStep() {
            if(this.step == 1) {
               if(!this.form.name){
                   this.errors = "Name is required";
                   return false;
               }
            }
            if(this.step == 2) {
                if(!this.form.phone){
                    this.errors = "Input field can not be empty";
                    return false;
                }
            }
            if(this.step == 3){
                if(!this.form.message){
                    this.erros = "Input field can not be empty";
                    return false;
                }
            }
            this.step++;
            this.errors = null;
        },
        prevStep() {
            this.step--;
        },
        sendQuery(){
            this.submit = true;
        },

        fetch() {
            let self = this;
            axios.get('api/multiFormData/fetch')
            .then(function (response) {
                // console.log(response);
                self.users = response.data;
                console.log(self.users);
            })
            .catch(function (error) {
                console.log(error)
            })

        },

        store() {
            let self = this;
            let params =Object.assign({}, self.form);
            axios.post('api/multiFormData/store', params)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
.error {
    color: red;
}
#btn {
    width: 100px;
    margin-top: -15px;
    height: 37px;
}
</style>
