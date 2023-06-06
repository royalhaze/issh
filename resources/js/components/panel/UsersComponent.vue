<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div class="card-header header-elements">
                <h4>
                    Users
                </h4>
                <div class="card-header-elements ms-auto">
                    <button @click="create_new_user" type="button" class="btn btn-sm btn-success">
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
                        <th>Client Limit</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <tr>
                        <td><i class="align-middle fab fa-angular fa-lg text-danger me-3"></i> <strong>پروژه
                            انگولار</strong></td>
                        <td>استیو جابز</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="تونی استارک">
                                    <img src="/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="بیل گیتس">
                                    <img src="/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="دیوید بکهام">
                                    <img src="/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-primary me-1">فعال</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        حذف</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="align-middle fab fa-react fa-lg text-info me-3"></i> <strong>پروژه React</strong>
                        </td>
                        <td>بری الن</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="تونی استارک">
                                    <img src="/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="بیل گیتس">
                                    <img src="/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="دیوید بکهام">
                                    <img src="/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-success me-1">اتمام یافته</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        حذف</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><i class="align-middle fab fa-vuejs fa-lg text-success me-3"></i> <strong>پروژه
                            VueJs</strong></td>
                        <td>تونی استارک</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="تونی استارک">
                                    <img src="/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="بیل گیتس">
                                    <img src="/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="دیوید بکهام">
                                    <img src="/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-info me-1">زمان‌بندی شده</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        حذف</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="align-middle fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>پروژه
                            بوت‌استرپ</strong>
                        </td>
                        <td>بیل گیتس</td>
                        <td>
                            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="تونی استارک">
                                    <img src="/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="بیل گیتس">
                                    <img src="/assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                </li>
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-xs pull-up" title="" data-bs-original-title="دیوید بکهام">
                                    <img src="/assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                </li>
                            </ul>
                        </td>
                        <td><span class="badge bg-label-warning me-1">در انتظار</span></td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i
                                        class="bx bx-edit-alt me-1"></i> ویرایش</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                        حذف</a>
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
                    <form id="editUserForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
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
                        </div>
                        <div class="col-12 col-md-6 fv-plugins-icon-container">
                            <label class="form-label" for="concurrent_users">Concurrent Users</label>
                            <input v-model="user.concurrent_users" type="text" id="concurrent_users" class="form-control"
                                   placeholder="0">
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
export default {
    name: "UsersComponent",
    data() {
        return {
            user: {
                from_now:'true',
                bandwidth: 0,
                concurrent_users : 1,
            }
        }
    },
    methods: {
        create_new_user() {
            this.$modal.show('new');
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
        }
    }
}
</script>

<style scoped>

</style>
