<template>
<div>
    <div class="container" id="app">
        <div class="panel-group">
            <div class="panel panel-primary">
                <br>
                <div class="panel-heading">Add Remove Table Row Dynamically In VueJs</div>

                <div class="panel-body">
                    <button type="button" class="btn btn-primary" @click="addRow">+</button>

                    <table class="table table-bordered">
                        <thead class="text text-success">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr v-for='(user, index) in users.slice().reverse()'>
                                <td>
                                    <input  v-model="user.name"  class="form-control" type="text" />
                                </td>
                                <td>
                                    <input v-model="user.email" class="form-control" type="text" />
                                </td>
                                <td>
                                    <input v-model="user.mobno" class="form-control" type="text"/>
                                </td>
                                <td>
                                    <button type="button" @click="deleteRow(index)"  class="btn btn-danger">x</button>
                                    <button type="button" class="btn btn-primary" @click="addRow">+</button>
                                </td>
                            </tr>
                        </tbody>
                        <button  class="btn btn-primary" @click="storeMultipleData()">Submit</button>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
name: "CustomerDetails",
    data() {

     return {

         users:[ {name:'',email:'',mobno:''} ],

         httpRequest: axios.post,

         url: 'api/multiData/store',
     }

    },
    methods: {
        addRow: function() {
            this.users.push({name:'',email:'',mobno:''})
        },
        deleteRow(index){
            // this.users.splice(index,1);
            this.users.splice(index, this.users.length - 1).reverse();
        },

        storeMultipleData: function () {
            // axios.post('api/multiData/store', this.users)
            // .then( response => {
            //     console.log(response.data);
            // })
            // .catch( error => {
            //     console.log(error);
            // })

            this.callAxios(this.httpRequest, this.url, this.users)
        },

        callAxios: function (http, url, data) {
            http(url, data)
            .then( response => {
                console.log(response.data);
            })
            .catch( error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>

</style>
