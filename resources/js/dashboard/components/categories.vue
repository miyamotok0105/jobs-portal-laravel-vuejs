<template>
    <div>
        <!-- Display Card -->
        <div class="card">
            <!-- Card Header -->
            <div class="card-header">
                <button v-on:click="openModel('#category-model')" class="btn btn-primary btn-sm" type="button" style="min-width: 130px;"><i class="fa fa-plus"></i> Add New</button>
                <div class="card-tools">
                    <h5 style="margin-top:5px;">{{this.categories.length}} Category</h5>
              </div>
            </div>
            <!-- Card Body -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-center">
                  <thead>
                      <th>Category name</th>
                      <th>Jobs Number</th>
                      <th>Actions</th>
                  </thead>
                  <tbody>
                      <tr v-for="cat in categories" :key="cat.id">
                        <td>{{cat.name}}</td>
                        <td>{{cat.jobs.length}}</td>
                        <td>
                            <div class="btn-group">
                                <button v-on:click="openModel('#category-model',cat)" class="btn btn-default btn-sm" type="button"> <i class="fa fa-edit"></i> </button>
                                <button v-on:click="destroy(cat.id)" class="btn btn-default btn-sm" type="button"> <i class="fa fa-trash"></i> </button>
                            </div>
                        </td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
        <!-- Add New Model -->
        <div class="modal fade" id="category-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
              <div class="modal-body">
                  <div class="form-group">
                      <label>Category name</label>
                      <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" type="text" name="name" class="form-control text-center" autocomplete="off">
                      <has-error :form="form" field="name"></has-error>
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
                categories: [],
                editMode: false,
                form:new Form({
                    id: '',
                    name:''
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
             // Fetch Categories Method
             fetch:function()
             {
                 axios.get('categories/fetch')
                      .then((response) => {
                          this.categories = response.data;
                      })
                      .catch((error) => {
                          console.log(error);
                      });
             },

             // Store New Category Method
             store:function()
             {
                 this.form.post('categories/store')
                         .then(() => {
                             this.fetch();
                             $('#category-model').modal('hide');
                             swal.fire('Category Add','New Category Added Successfully','success');
                         })
                         .catch((error) => {
                             console.log(error);
                         });
             },

             // Update One Category
             update:function()
             {
                 this.form.post('categories/update/' + this.form.id)
                          .then(() => {
                              this.fetch();
                              $('#category-model').modal('hide');
                              swal.fire('Category Eidt','Edit Successfully','success')
                          })
                          .catch(() => {
                              swal.fire('Error','something Wrong !','error')
                          });
             },

             // Destroy One Category Method
             destroy:function(id)
             {
                 swal.fire({
                      title: 'Are you sure?',
                      text: "This category will be deleted with all related jobs",
                      type: 'question',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value)
                      {
                           axios.get('categories/destroy/',{params:{ID:id}}).then(() => {this.fetch();}).catch((error) => {console.log(error);});
                           swal.fire('Deleted!','Category has been deleted !','success');
                      }
                  });
             },

             // Open Model Method
             openModel:function(model,category = null)
             {
                 if(category == null)
                 {
                     this.editMode = false;
                     this.form.reset();
                 }
                 else
                 {
                     this.editMode = true;
                     this.form.fill(category);
                 }
                 $(model).modal('show');
             },

         },// End Mounted Section ------
    }
</script>
