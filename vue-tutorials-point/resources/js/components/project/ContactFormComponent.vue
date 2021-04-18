<template>
<div class="container">
    <h2>Add Contact</h2>
    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
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
                            <button type="button" class="btn btn-danger" @click="cancelModal()">Cancel</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
<!--                    <button type="button" id="btn_text" class="btn btn-primary" onclick="createPost()">Save</button>-->
<!--                    <button type="button" id="btn_text" class="btn btn-danger" onclick="cancelModal()">Cancel</button>-->
                </div>
            </div>
        </div>
    </div>

    <br>
    <h5>List Of Contact</h5>
<!--    <b-button v-b-modal.modal-prevent-closing>Add Contact</b-button>-->
    <b-button @click="showModal()">Add Contact</b-button>
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
        showModal: function () {
            this.emptyData();
            $("#post-modal").modal('show');
        },

        cancelModal: function () {
            $("#post-modal").modal('hide');
        },


        fetchContactList:function(){
            console.log('Fetching contacts...');
            axios.get('api/contacts')
                .then((response) => {
                    console.log(response.data);
                    // this.lists = response.data;
                    this.lists = response.data.slice().reverse();
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
                $("#post-modal").modal('hide');

                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                })

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
                $("#post-modal").modal('show');
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
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('api/contact/'+id)
                        .then( function (response) {
                            if (response){
                                self.fetchContactList()
                            }
                        })
                        .catch( function (error) {
                            console.log(error);
                        })
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
            // axios.delete('api/contact/'+id)
            // .then( function (response) {
            //     if (response){
            //         self.fetchContactList()
            //     }
            // })
            // .catch( function (error) {
            //     console.log(error);
            // })
        },

        emptyData: function () {
            this.contact.name = '';
            this.contact.email = '';
            this.contact.phone = '';
            this.edit = false;
        }
    }

    // created() {
    //     this.fetchContactList();
    // }
    //
    // updated() {
    //     this.fe
    // }
}
</script>

<style scoped>

</style>
