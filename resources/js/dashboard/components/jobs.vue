<template>
    <div>
        <div class="row">
            <div class="col-md-6">
                <button v-on:click="openModel('#jobs-model')" type="button" name="button" class="btn btn-primary btn-lg" style="margin-bottom:13px;"> <i class="fa fa-plus"></i> Add New Job</button>
            </div>
            <div class="col-md-6">
                <input v-model="search" class="form-control form-control-lg" type="text" name="search" placeholder="Search By Job Title" autofocus>
            </div>
        </div>

        <div v-for="job in filterItems(jobs)" :key="job.id" class="card text-center">
            <div class="card-header">
                <h5 class="card-title">{{job.title}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{job.category.name}} <i class="fa fa-arrow-left"></i> {{job.location.name}} <i class="fa fa-arrow-left"></i> {{job.company.name}} <i class="fa fa-arrow-left"></i> {{job.type.name}}</h6>
                <h6 class="card-subtitle mb-2 text-muted"> <i class="fa fa-clock"></i> {{job.created_at}}</h6>
            </div>
          <div class="card-body">
            <p class="card-text">{{job.description}}</p>
            <p class="card-text">{{job.qualifications}}</p>
          </div>
          <div class="card-footer">
              <div class="text-left">
                  <button v-on:click="openModel('#jobs-model',job)" type="button" class="btn btn-link btn-lg"> <i class="fa fa-edit"></i> </button>
                  <button v-on:click="destroy(job.id)" type="button" class="btn btn-link btn-lg" style="color:#ea2638;"> <i class="fa fa-trash"></i> </button>
                  <h6 style="float:right;margin-top:10px;">{{job.apply_email}}  <i class="fa fa-heart"></i> {{job.expected_salary}}</h6>
              </div>
          </div>
        </div>

        <!-- Add New Model -->
        <div class="modal fade" id="jobs-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Jobs</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form @submit.prevent="editMode ? update() : store()" @keydown="form.onKeydown($event)">
              <div class="modal-body">
                  <div class="form-group">
                    <label>Title</label>
                    <input v-model="form.title" type="text" name="title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="title"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Select Category</label>
                    <select v-model="form.category_id" class="form-control" :class="{ 'is-invalid': form.errors.has('category_id') }" name="category_id">
                        <option value="">Please Select Category</option>
                        <option v-for="cat in categories" :value="cat.id">{{cat.name}}</option>
                    </select>
                    <has-error :form="form" field="category_id"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Select Location</label>
                    <select v-model="form.location_id" class="form-control" :class="{ 'is-invalid': form.errors.has('location_id') }"  name="location_id">
                        <option value="">Please Select Location</option>
                        <option v-for="loc in locations" :value="loc.id">{{loc.name}}</option>
                    </select>
                    <has-error :form="form" field="location_id"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Select Company</label>
                    <select v-model="form.company_id" class="form-control" :class="{ 'is-invalid': form.errors.has('company_id') }" name="company_id">
                        <option value="">Please Select Company</option>
                        <option v-for="comp in companies" :value="comp.id">{{comp.name}}</option>
                    </select>
                    <has-error :form="form" field="company_id"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Select Type</label>
                    <select v-model="form.type_id" class="form-control" :class="{ 'is-invalid': form.errors.has('type_id') }" name="type_id">
                        <option value="">Please Select Type</option>
                        <option v-for="ty in types" :value="ty.id">{{ty.name}}</option>
                    </select>
                    <has-error :form="form" field="type_id"></has-error>
                  </div>

                  <div class="form-group">
                      <label>Job Description or Details</label>
                      <textarea v-model="form.description" class="form-control" :class="{ 'is-invalid': form.errors.has('description') }" name="description" rows="8" cols="80"></textarea>
                      <has-error :form="form" field="description"></has-error>
                  </div>

                  <div class="form-group">
                      <label>Job Qualifications</label>
                      <textarea v-model="form.qualifications" class="form-control" :class="{ 'is-invalid': form.errors.has('qualifications') }" name="qualifications" rows="8" cols="80"></textarea>
                      <has-error :form="form" field="qualifications"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Expected Salary</label>
                    <input v-model="form.expected_salary" type="text" name="expected_salary" class="form-control" :class="{ 'is-invalid': form.errors.has('expected_salary') }" placeholder="Example : $1000 - $2000">
                    <has-error :form="form" field="expected_salary"></has-error>
                  </div>

                  <div class="form-group">
                    <label>Apply Email</label>
                    <input v-model="form.apply_email" type="email" name="apply_email" class="form-control" :class="{ 'is-invalid': form.errors.has('apply_email') }" placeholder="Apply@email.com">
                    <has-error :form="form" field="apply_email"></has-error>
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
                jobs: [],
                editMode: false,
                form: new Form({
                    id:'',
                    category_id:'',
                    location_id:'',
                    company_id:'',
                    type_id:'',
                    title:'',
                    description:'',
                    qualifications:'',
                    expected_salary:'',
                    apply_email:''
                }),
                categories: [],
                companies: [],
                locations: [],
                types: [],
                search: ''
            }
        },// End Data Section ------

        /**
         * Mounted Section
         */
        mounted()
        {
            this.fetch();
            this.repare();
        },// End Mounted Section ------

        /**
         * Methods Section
         */
         methods:
         {
             // Repare Method
             repare()
             {
                 axios.get('categories/fetch').then((response) => {this.categories = response.data;}).catch((error) => {console.log(error);});
                 axios.get('companies/fetch').then((response) => {this.companies = response.data;}).catch((error) => {console.log(error);});
                 axios.get('locations/fetch').then((response) => {this.locations = response.data;}).catch((error) => {console.log(error);});
                 axios.get('types/fetch').then((response) => {this.types = response.data;}).catch((error) => {console.log(error);});
             },

             // Fetch Method
             fetch()
             {
                axios.get('jobs/fetch')
                     .then((response) => {
                         this.jobs = response.data;
                     })
                     .catch((error) => {
                        console.log(error);
                     });
             },

             // Store Function
             store()
             {
                this.form.post('jobs/store')
                         .then(() => {
                             this.fetch();
                             $('#jobs-model').modal('hide');
                             swal.fire('Job Add','New Job Added Successfully','success');
                         })
                         .catch(() => {
                              swal.fire('Error','something Wrong !','error')
                         });
             },

             //Update Method
             update()
             {
                 this.form.post('jobs/update?ID=' + this.form.id)
                          .then(() => {
                              this.fetch();
                              $('#jobs-model').modal('hide');
                              swal.fire('Job Edit','Edit Successfully','success');
                          })
                          .catch(() => {
                              swal.fire('Error','something Wrong !','error');
                          });
             },

             // Destroy Method
             destroy(id)
             {
                 swal.fire({
                      title: 'Are you sure?',
                      text: "This job will be deleted",
                      type: 'question',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                      if (result.value)
                      {
                           axios.get('jobs/destroy/' + id).then(() => {this.fetch();}).catch((error) => {console.log(error);});
                           swal.fire('Deleted!','Job has been deleted !','success');
                      }
                  });
             },

             // Filter Method
             filterItems(jobs)
             {
                 var app = this;
                 return jobs.filter(function(job){
                     let regex = new RegExp('(' + app.search + ')', 'i');
                     return job.title.match(regex);
                 })
             },

             // Open Model Method
             openModel:function(model,job = null)
             {
                 if(job == null)
                 {
                     this.editMode = false;
                     this.form.reset();
                 }
                 else
                 {
                     this.editMode = true;
                     this.form.fill(job);
                 }
                 $(model).modal('show');
             },

         },// End Mounted Section ------
    }
</script>
