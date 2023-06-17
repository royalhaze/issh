<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header header-elements">
                <h4>
                    Users
                </h4>
                <div class="card-header-elements ms-auto">
                    <button @click="show_modal('new')" type="button" class="btn btn-sm btn-success">
                        <span class="tf-icon bx bx-plus bx-xs"></span> Create New
                    </button>
                </div>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table table-striped table-responsive">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Bandwidth Usage</th>
                        <th>Client Limit</th>
                        <th>Contact Info</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tr v-for="user in users.data">
                        <td><strong>
                            {{user.id}}
                        </strong></td>
                        <td>      {{user.username}}</td>
                        <td>
<!--                            {{ }}-->
                        </td>
                        <td>
                            {{user.connection_limit}}
                        </td>
                        <td>
                            <!--                            {{ }}-->
                        </td>
                        <td>
                            {{user.expire_date}}
                        </td>
                        <td v-if="user.status == 'active'">
                            <span class="badge bg-label-success me-1">{{ user.status }}</span>
                        </td>
                        <td v-else>
                            <span class="badge bg-label-danger me-1">{{ user.status }}</span>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <modal name="new">
            <div class="modal-content p-3 ">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="secondary-font">Create New User</h3>
                    </div>
                    <form :key="form_key" @submit.prevent="create_user" id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                          onsubmit="return false" novalidate="novalidate">
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="username">Username *</label>
                            <input v-model="user.username" type="text" id="username" class="form-control"
                                   placeholder="username">
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="password">Password *</label>
                            <input v-model="user.password" type="text" id="password" class="form-control"
                                   placeholder="password">
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="email">Email</label>
                            <input v-model="user.email" type="email" id="email" class="form-control"
                                   placeholder="email">
                        </div>

                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input v-model="user.phone" type="text" id="phone" class="form-control" placeholder="phone">
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-md mb-md-0 mb-2">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label @click="change_expire_type" class="form-check-label custom-option-content" for="customRadioTemp1">
                                            <input v-model="user.from_now" name="customRadioTemp"
                                                   class="form-check-input" type="radio" value="true"
                                                   id="customRadioTemp1" checked="">
                                            <span class="custom-option-header">
                                <span class="h6 mb-0">Start Now</span>

                                            </span>
                                            <span class="custom-option-body">
                                <small>Countdown from now</small>
                              </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-check custom-option custom-option-basic">
                                        <label @click="change_expire_type" class="form-check-label custom-option-content" for="customRadioTemp2">
                                            <input v-model="user.from_now" name="customRadioTemp"
                                                   class="form-check-input" type="radio" value="false"
                                                   id="customRadioTemp2">
                                            <span class="custom-option-header">
                                <span class="h6 mb-0">Since First Connect</span>

                              </span>
                                            <span class="custom-option-body">
                                <small>Expire since first connection</small>
                              </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label v-if="user.from_now === 'true'" class="form-label">Expire Time</label>
                            <date-picker class="form-label" v-if="user.from_now === 'true'"
                                locale="en"
                                v-model="user.expire"
                                type="datetime"
                                format="YYYY-MM-DD HH:mm"
                                display-format="YYYY-MM-DD HH:mm"
                            />

                            <label v-if="user.from_now !== 'true'" class="form-label" for="expire">Expire Time</label>
                            <input v-if="user.from_now !== 'true'" v-model="user.expire" type="text" id="expire"
                                   class="form-control" placeholder="30">
                        </div>

                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="bandwidth">Bandwidth</label>
                            <input v-model="user.bandwidth" type="text" id="bandwidth" class="form-control"
                                   placeholder="0">
                            <div id="defaultFormControlHelp" class="form-text">
                               in GB unit , 0 = unlimited
                            </div>
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="concurrent_users">Concurrent Users</label>
                            <input v-model="user.concurrent_users" type="text" id="concurrent_users" class="form-control"
                                   placeholder="0">
                            <div id="defaultFormControlHelp2" class="form-text">
                                0 = unlimited
                            </div>
                        </div>


                        <div class="col-12 text-center mt-4">
                            <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                            <button @click="reset_form" type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                Reset Form
                            </button>
                        </div>
                        <div></div>
                        <input type="hidden"></form>
                </div>
            </div>
        </modal>
    </div>

</template>

<script>
import HttpService from "../../services/httpService/HttpService";
import HttpValidator from "../../services/httpValidator/HttpValidator";
import Notification from "../../services/notification/Toastr";
export default {
    name: "UsersComponent",
    data() {
        return {
            user: {
                from_now:'true',
                bandwidth: 0,
                concurrent_users : 1,
            },
            form_key:0,
            httpValidator : new HttpValidator(),
            users:{}
        }
    },
    methods: {
        show_modal(name) {
            this.$modal.show(name);
        },
        hide_modal(name) {
            this.$modal.hide(name);
        },
        change_expire_type(){
            this.user.expire = null;
        },
        reset_form(){
            this.user = {
                from_now:'true',
                bandwidth: 0,
                concurrent_users : 1,
            };
            this.form_key++;
        },
        create_user(){
            let loader = this.$loading.show({});

            HttpService.post('/web-api/users/store',this.user).then(response => {
                if (response.data.status){
                    this.reset_form();
                    this.hide_modal('new');
                    this.$swal.fire({
                        icon: 'success',
                        title: 'User Created',
                        text: response.data.message,
                    });
                }else {
                    this.$swal.fire({
                        icon: 'error',
                        title: 'Error !',
                        text: response.data.message,
                    });
                }

            }).catch(error=>{
                this.httpValidator.is_validation_error(error.response);
            });

            loader.hide();
        },
        get_data(){
            let loading = this.$loading.show({});

            HttpService.get('/web-api/users').then(response=>{
                this.users = response.data.users;
            }).catch(error=>{
                Notification.default_error();
            })

            loading.hide();
        }
    },
    mounted() {
        this.get_data();
    }
}
</script>

<style scoped>

</style>
