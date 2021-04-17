<template>
<div class="container">
    <h2>Add Contact</h2>
    <b-modal id="modal-prevent-closing" ref="modal" title="Submit Your Info" @show="resetModal" @hidden="resetModal" @ok="handleOk">

        <form action="#" @submit.prevent=" edit ? updateContact(contact.id) : createContact()">
            <div class="form-group">
                <label>Name</label>
                <input v-model="contact.name" type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input v-model="contact.email" type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input v-model="contact.phone" type="number" name="phone" class="form-control">
            </div>
            <div class="form-group">
                <button v-show="!edit" type="submit" class="btn btn-primary">New Contact</button>
                <button v-show="edit" type="submit" class="btn btn-primary">Update Contact</button>
            </div>
        </form>

    </b-modal>
    <br>
    <h5>List Of Contact</h5>
    <b-button v-b-modal.modal-prevent-closing>Add Contact</b-button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Sl</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
           <tr v-for="(list, index) in lists" :key="index">
               <td>{{ lists.length - index }}</td>
<!--               <td>{{ index  + 1 }}</td>-->
               <td>{{ list.name}}</td>
               <td>{{ list.email}}</td>
               <td>{{ list.phone}}</td>
               <td>
                   <button @click="showContact(list.id)" class="btn btn-primary btn-sm">Edit</button>
                   <button @click="deleteContact(list.id)" class="btn btn-danger btn-sm">Delete</button>
               </td>
           </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
name: "ContactFormComponent",
    data () {
       return {
           edit: false,
           lists: [],
           contact: {
               id: '',
               name:'',
               email:'',
               phone: ''
           }
       }
    },

    mounted: function() {
      console.log('mounted Fetching data...');
      this.fetchContactList();
    },
    methods: {
        fetchContactList:function(){
            console.log('Fetching contacts...');
            axios.get('api/contacts')
                .then((response) => {
                    console.log(response.data);
                    // this.lists = response.data;
                    this.lists = response.data.slice().reverse();;
                }).catch((error) => {
                console.log(error);
            });
        },
        createContact: function () {
            console.log('Creating contact ....');
            let self = this;
            let params = Object.assign({}, self.contact);
            axios.post('api/contact/store', params)
            .then( function (){
                self.contact.name = '';
                self.contact.email = '';
                self.contact.phone = '';
                self.edit = false;
                self.fetchContactList();
            })
            .catch(function (error) {
                console.log(error);
            })
        },
        showContact: function (id) {
            let self = this;
            axios.get('api/contact/'+id)
            .then( function (response) {
                self.contact.id = response.data.id;
                self.contact.name = response.data.name;
                self.contact.email = response.data.email;
                self.contact.phone = response.data.phone;

            })
            self.edit = true;
        },
        updateContact: function (id) {
            console.log('Update contact '+id+'...');
            let self = this;
            let params = Object.assign({}, self.contact)
            axios.patch('api/contact/'+id, params)
            .then(function () {
                self.contact.name = '';
                self.contact.email = '';
                self.contact.phone = '';
                self.edit = false;
                self.fetchContactList();
            })
            .catch( function (error) {
                console.log(error);
            })
        },

        deleteContact: function (id) {
            console.log('Delete Contact list.....');
            let self = this;
            axios.delete('api/contact/'+id)
            .then( function (response) {
                if (response){
                    self.fetchContactList()
                }
            })
            .catch( function (error) {
                console.log(error);
            })
        }


    }
}
</script>

<style scoped>

</style>
