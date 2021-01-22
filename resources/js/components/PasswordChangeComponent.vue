<template>
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Change Password</h1>
        </div>
        <div class="card-body">
            <div v-if='showError'>
                <div v-for="error in errors">
                    <div class="alert alert-danger">
                        {{ error }}
                    </div>
                </div>
            </div>
            <div v-if='showMessage'>
                <div class=" alert" v-bind:class="{ 'alert-success' : hasSuccess, 'alert-danger' : hasError }">
                    {{ message }}
                </div>
            </div>
            <label for="current_passsword">Current Passsword</label>
            <input type="password" name="current_pass" v-model="current_pass" id="current_pass" value=""  class="form-control">
            <label for="new_password">New Password</label>
            <input type="password" name="new_pass" id="new_pass" v-model="new_pass" class="form-control">
        </div>
        <div class="card-footer">
            <button class="btn btn-success btn-block" @click="changePassword">Change Password</button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            title: 'Name',
            current_pass : '',
            new_pass: '',
            showError: false,
            errors: [],
            message: '',
            hasSuccess: false,
            hasError: false,
            showMessage: false,
        }
    },
    methods: {
        changePassword()  {
            if(this.current_pass == '' || this.new_pass == '')
            {
                this.errors = [
                    'Please enter current password',
                    'Please provide new password',
                ];
                this.showError = true;
            }
            else if(this.current_pass == '')
            {
                this.errors = '';
                this.errors = [
                    'Please enter current password',
                ];
                this.showError = true;
            }else if(this.new_pass == '')
            {
                this.errors = '';
                this.errors = [
                            'Please provide new password',
                                ];
                this.showError = true;

            }
            else{
                this.showError = false;
                axios.post('admin/change-password',{
                    'current_pass' : this.current_pass,
                    'new_pass': this.new_pass
                }).then((res) => {
                    if(res.data.response == 1)
                    {
                        this.current_pass = '';
                        this.new_pass = '';
                        this.message = res.data.message;
                        this.hasSuccess = true;
                        this.showMessage = true;
                    }
                    else{
                        this.message = res.data.message;
                        this.hasError = true;
                        this.showMessage = true;
                    }
                })
            }
        }
    }

}
</script>
