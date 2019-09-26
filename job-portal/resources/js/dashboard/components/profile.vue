<template>
    <div>
        <div class="card">
            <div class="card-header text-center">
                <h2>{{this.me.name}} Profile</h2>
            </div>
            <form @submit.prevent="update()" @keydown="me.onKeydown($event)">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Name</label>
                                <input v-model="me.name" :class="{ 'is-invalid': me.errors.has('name') }" type="text" name="name" class="form-control text-center" autocomplete="off">
                                <has-error :form="me" field="name"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Your Email</label>
                                <input v-model="me.email" :class="{ 'is-invalid': me.errors.has('email') }" type="text" name="email" class="form-control text-center" autocomplete="off">
                                <has-error :form="me" field="email"></has-error>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>

        <hr style="margin-top: 3rem; margin-bottom:3rem;">

        <!-- Password Update -->
        <div class="card">
            <div class="card-header text-center">
                <h2>Change Password</h2>
            </div>
            <form @submit.prevent="updatePassword()" @keydown="pass.onKeydown($event)">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Old Password</label>
                                <input v-model="pass.oldp" :class="{ 'is-invalid': me.errors.has('oldp') }" type="password" name="oldp" class="form-control text-center" autocomplete="off">
                                <has-error :form="pass" field="oldp"></has-error>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <input v-model="pass.newp" :class="{ 'is-invalid': me.errors.has('newp') }" type="password" name="newp" class="form-control text-center" autocomplete="off">
                                <has-error :form="pass" field="newp"></has-error>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary btn-block"> <i class="fa fa-save"></i> Save Changes</button>
                </div>
            </form>
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
                me: new Form({
                    id: '',
                    name: '',
                    email: ''
                }),

                pass: new Form({
                    oldp: '',
                    newp: ''
                })
            }
        },// End Data Section ------

        /**
         * Mounted Section
         */
        mounted()
        {
            axios.get('profile/fetch', {
                params:{
                    uid: this.$userID
                }
            })
            .then((resp) => {
                this.me.fill(resp.data);
            })
            .catch((error) => {
                console.log(error);
            });
        },// End Mounted Section ------

        /**
         * Methods Section
         */
         methods:
         {
             // Update Profile Method
             update()
             {
                 this.me.post('profile/update')
                        .then(() => {
                            swal.fire('Profile Update','Update Successfully','success')
                        })
                        .catch(() => {
                            swal.fire('Error','something Wrong !','error')
                        });
             },

             updatePassword()
             {
                 this.pass.post('profile/update-password')
                        .then((resp) => {
                            if(resp.data.e == 'err')
                            {
                                swal.fire('Password Update','Old Password is Wrong !','error');
                            }
                            else
                            {
                                swal.fire('Password Update','Update Successfully','success');
                                this.pass.reset();
                            }
                        })
                        .catch(() => {
                            swal.fire('Error','something Wrong !','error');
                        });
             }
         },// End Mounted Section ------
    }
</script>
