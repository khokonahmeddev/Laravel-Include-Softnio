<template>
    <div class="nk-content nk-content-lg">
        <div class="container wide-xl">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <div class="nk-block-head-sub"><span>My Profile</span></div>
                            <h2 class="nk-block-title fw-normal">Account Info</h2>
                            <div class="nk-block-des">
                                <p>You have full control to manage your own account setting. <span class="text-primary"><em
                                    class="icon ni ni-info"></em></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="nk-data data-list">
                                <div class="data-item" @click="profileModal('personal')">
                                    <div class="data-col">
                                        <span class="data-label">Full Name</span>
                                        <span class="data-value">{{ profileInfo.full_name }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" @click="profileModal('personal')">
                                    <div class="data-col">
                                        <span class="data-label">Display Name</span>
                                        <span
                                            class="data-value">{{
                                                profileInfo.last_name ?
                                                    profileInfo.last_name :
                                                    profileInfo.first_name
                                            }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col">
                                        <span class="data-label">Email</span>
                                        <span class="data-value">{{ profileInfo.email }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em
                                        class="icon ni ni-lock-alt"></em></span></div>
                                </div>
                                <div class="data-item" @click="profileModal('personal')">
                                    <div class="data-col">
                                        <span class="data-label">Phone Number</span>
                                        <span class="data-value text-soft">
                                                {{
                                                profileInfo.profile ? profileInfo.profile.phone_number : 'Not add yet'
                                            }}
                                        </span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" @click="profileModal('personal')">
                                    <div class="data-col">
                                        <span class="data-label">Date of Birth</span>
                                        <span class="data-value">
                                            {{
                                                profileInfo.profile ? profileInfo.profile.date_of_birth : 'Not add yet'
                                            }}
                                        </span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" @click="profileModal('address')"
                                     data-tab-target="#address">
                                    <div class="data-col">
                                        <span class="data-label">Address</span>
                                        <span class="data-value">{{
                                                profileInfo.address ? profileInfo.address.address_line_one : ''
                                            }},<br>
                                        {{ profileInfo.address ? profileInfo.address.address_line_two : '' }}
                                        </span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                        class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="profile-modal">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <app-profile-modal v-if="isModalActive"
                                   :profile-info="profileInfo"
                                   :tab-type="isTabActiveType"
                                   @close-modal="closeModal"/>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Profile",
    data() {
        return {
            profileInfo: {},
            isModalActive: false,
            isTabActiveType: ''
        }
    },
    methods: {
        getProfile() {
            axios.get('auth/profile').then(({data}) => {
                this.profileInfo = data;
            })
        },
        profileModal(type) {
            this.isModalActive = true;
            this.isTabActiveType = type
            $('#profile-modal').modal('show')
        },
        closeModal() {
            this.isModalActive = false;
            $('#profile-modal').modal('hide')
        }
    },
    mounted() {
        $('#profile-modal').on('hidden.bs.modal', (e) => {
            this.isTabActiveType = '';
            this.getProfile();
            this.isModalActive = false;
        });
    },
    created() {
        this.getProfile();
    }
}
</script>

