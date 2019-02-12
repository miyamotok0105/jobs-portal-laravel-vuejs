<template>
    <div>
        <div class="card">
            <div class="card-header">
                <button v-on:click="openModel('users-model')" class="btn btn-primary" type="button"> <i class="fa fa-plus"></i> Add Administrator</button>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th class="text-center">Actions</th>
                    </thead>
                    <tbody>
                        <tr v-for="user in users" :key="user.id">
                            <td>{{user.name}}</td>
                            <td>{{user.email}}</td>
                            <td class="text-center">
                                <button v-on:click="destroy(user.id)" class="btn btn-danger btn-sm" type="button" style="width:100px;"> <i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Add New Model -->
        <div class="modal fade" id="users-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Administrators</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="store()" @keydown="form.onKeydown($event)">
              <div class="modal-body">
                  <div class="form-group">
                      <label>Name</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" type="text" name="name" class="form-control text-center" autocomplete="off" placeholder="Type the name here">
                      <has-error :form="form" field="name"></has-error>
                  </div>

                  <div class="form-group">
                      <label>Email</label>
                      <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" type="email" name="email" class="form-control text-center" autocomplete="off" placeholder="Do not use an email that was previously used">
                      <has-error :form="form" field="email"></has-error>
                  </div>

                  <div class="form-group">
                      <label>Create Password</label>
                      <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" type="password" name="password" class="form-control text-center" autocomplete="off" placeholder="You should not have a password for 6 numbers or letters">
                      <has-error :form="form" field="password"></has-error>
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:80px;">Cancel</button>
                <button type="submit" name="submit" class="btn btn-primary" style="width:80px;">Save</button>
              </div>
            </form>
            </div>
          </div>
        </div>

    </div>
</template>

<script>
    export default {
        /**
         * Data Section
         */
        data()
        {
            return{
                users: [],
                form: new Form({
                    name: '',
                    email: '',
                    password: ''
                })
            }
        },// End Data Section ------

        /**
         * Mounted Section
         */
        mounted()
        {
            this.fetch();
        },// End Mounted Section ------

        /**
         * Methods Section
         */
         methods:
         {
             // Fetch Method
             fetch()
             {
                axios.get('users/fetch')
                     .then((response) => {
                         this.users = response.data;
                     })
                     .catch((e) => {
                         console.log(e)
                     });
             },

             // Store Method
             store()
             {
                 this.form.post('users/store')
                          .then(() => {
                              this.fetch();
                              this.closeModel('users-model');
                              swal.fire('Administrator Add','New Administrator Added Successfully','success');
                          })
                          .catch((e) => {
                              console.log(e);
                               swal.fire('Error','something Wrong !','error');
                          });
             },

             // Destroy Method
             destroy(id)
             {
                 swal.fire({
                      title: 'Are you sure?',
                      text: "This Administrator will be permanently deleted and you will not be able to undo it after that",
                      type: 'question',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value)
                      {
                           axios.get('users/destroy/' + id).then(() => {this.fetch();}).catch((error) => {console.log(error);});
                           swal.fire('Deleted!','Administrator has been deleted !','success');
                      }
                  });
             },

             openModel(model)
             {
                 $('#'+model).modal('show');
             },

             closeModel(model)
             {
                $('#'+model).modal('hide');
             },

         },// End Mounted Section ------
    }
</script>
