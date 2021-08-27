<template>
    <div class="modal-content">
        <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
        <div class="modal-body modal-body-lg">
            <h5 class="title">Update Profile</h5>
            <div class="alert alert-success text-center" role="alert" v-if="message">{{ message }}</div>
            <ul class="nk-nav nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" :class="{ active: tabType === 'personal' }" data-toggle="tab" href="#personal">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" :class="{ active: tabType === 'address' }" data-toggle="tab" href="#address">Address</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" :class="{ active: tabType === 'personal' }" id="personal">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="full-name">Full Name</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="full-name"
                                       placeholder="Enter Full name"
                                       v-model="profileInfo.full_name">
                                <small class="text-danger"
                                       v-if="errors.first_name">{{
                                        errors.first_name[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="display-name">Display Name</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="display-name"
                                       placeholder="Enter display name"
                                       v-model="profileInfo.last_name">
                                <small class="text-danger"
                                       v-if="errors.last_name">{{
                                        errors.last_name[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="phone-no">Phone Number</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="phone-no"
                                       placeholder="Phone Number"
                                       v-model="formData.phone_number">
                                <small class="text-danger"
                                       v-if="errors.phone_number">{{
                                        errors.phone_number[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="birth-day">Date of Birth</label>
                                <input type="date"
                                       class="form-control form-control-lg"
                                       id="birth-day"
                                       placeholder="Enter your name"
                                       v-model="formData.date_of_birth">
                                <small class="text-danger"
                                       v-if="errors.date_of_birth">{{
                                        errors.date_of_birth[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="custom-control custom-switch">
                                <input type="checkbox"
                                       class="custom-control-input"
                                       id="latest-sale"
                                       v-model="profileInfo.display_name">
                                <label class="custom-control-label" for="latest-sale">Use full name to
                                    display </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <button class="btn btn-lg btn-primary" type="button" @click.prevent="updateProfile">
                                        <div class="spinner-border" v-if="loading"></div>
                                        <template v-if="!loading">Update Profile</template>

                                    </button>
                                </li>
                                <li>
                                    <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" :class="{ active: tabType === 'address' }" id="address">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="address-l1">Address Line 1</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="address-l1"
                                       v-model="formData.address_line_one"
                                >
                                <small class="text-danger"
                                       v-if="errors.address_line_one">{{
                                        errors.address_line_one[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="address-l2">Address Line 2</label>
                                <input type="text" class="form-control form-control-lg" id="address-l2"
                                       v-model="formData.address_line_two">
                                <small class="text-danger"
                                       v-if="errors.address_line_two">{{
                                        errors.address_line_two[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="address-st">State</label>
                                <input type="text"
                                       class="form-control form-control-lg"
                                       id="address-st"
                                       v-model="formData.state">
                                <small class="text-danger"
                                       v-if="errors.state">{{
                                        errors.state[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="county">Country</label>
                                <select class="form-control form-control-lg" id="county" v-model="formData.country">
                                    <option value="canada">Canada</option>
                                    <option value="united_state">United State</option>
                                    <option value="united_kindom">United Kindom</option>
                                    <option value="australia">Australia</option>
                                    <option value="india">India</option>
                                    <option value="bangladesh">Bangladesh</option>
                                </select>
                                <small class="text-danger"
                                       v-if="errors.country">{{
                                        errors.country[0]
                                    }}</small>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                <li>
                                    <button type="button" class="btn btn-lg btn-primary"
                                            @click.prevent="updateProfile">

                                        <div class="spinner-border" v-if="loading"></div>
                                        <template v-if="!loading">Update Address</template>
                                    </button>
                                </li>
                                <li>
                                    <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ProfileModal",
    props: {
        profileInfo: {},
        tabType: {}
    },
    data() {
        return {
            loading: false,
            formData: {
                phone_number: '',
                date_of_birth: '',
                address_line_one: '',
                address_line_two: '',
                state: '',
                country: '',
            },
            message: '',
            errors: {}
        }
    },
    methods: {
        updateProfile() {
            this.loading = true;
            const formData = {...this.profileInfo, ...this.formData};
            formData.display_name = this.profileInfo.display_name ? 1 : 0;
            axios.post('/auth/profile-update', formData).then(({data}) => {
                this.message = data.message;
                this.errors = {}
                setTimeout(() => {
                    this.message = '';
                    this.$emit("close-modal");
                }, 1000)
            }).catch((error) => {
                this.errors = error.response.data.errors;
            }).finally(() => {
                this.loading = false;
            })

        },
        setUser() {
            let profile = this.profileInfo.profile;
            let address = this.profileInfo.address;
            this.profileInfo.display_name = this.profileInfo.display_name ? true : false;
            this.formData.phone_number = profile ? profile.phone_number : '';
            this.formData.date_of_birth = profile ? profile.date_of_birth : '';
            this.formData.address_line_one = address ? address.address_line_one : '';
            this.formData.address_line_two = address ? address.address_line_two : '';
            this.formData.state = address ? address.state : '';
            this.formData.country = address ? address.country : '';
        }
    },
    mounted() {
        this.setUser();
    }
}
</script>

