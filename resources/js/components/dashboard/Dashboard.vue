<template>
    <div class="nk-content nk-content-lg">
        <div class="container wide-xl">
            <div class="nk-content-inner">
                <div class="nk-content-body">

                    <div class="nk-block-head">
                        <div class="nk-block-between-md g-3">
                            <div class="nk-block-head-content">
                                <div class="nk-block-head-sub"><span>Welcome!</span></div>
                                <div class="align-center flex-wrap pb-2 gx-4 gy-3">
                                    <div>
                                        <h2 class="nk-block-title fw-normal">{{ userInfo.name }}</h2>
                                    </div>
                                </div>
                                <div class="nk-block-des">
                                    <p>At a glance summary of your account. Have fun today!</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="between-center flex-wrap flex-md-nowrap g-3">
                                    <div class="media media-center gx-3 wide-xs">
                                        <div class="media-object">
                                            <em class="icon icon-circle icon-circle-lg ni ni-file-docs"></em>
                                        </div>
                                        <div class="media-content">
                                            <p>You have successfully register your account, please complete your
                                                account varification application.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="nk-block-actions flex-shrink-0">
                                        <a href="" class="btn btn-primary" @click.prevent="submitKyc">Submit KYC</a>
                                    </div>
                                </div>
                            </div><!-- .nk-card-inner -->
                        </div>
                    </div><!-- .nk-block -->

                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-md-6">
                                <div class="card card-bordered card-full">
                                    <div class="nk-wg1">
                                        <div class="nk-wg1-block">
                                            <div class="nk-wg1-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                    <rect x="5" y="7" width="60" height="56" rx="7" ry="7"
                                                          fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <rect x="25" y="27" width="60" height="56" rx="7" ry="7"
                                                          fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <rect x="15" y="17" width="60" height="56" rx="7" ry="7"
                                                          fill="#fff" stroke="#6576ff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="15" y1="29" x2="75" y2="29" fill="none"
                                                          stroke="#6576ff" stroke-miterlimit="10"
                                                          stroke-width="2"/>
                                                    <circle cx="53" cy="23" r="2" fill="#c4cefe"/>
                                                    <circle cx="60" cy="23" r="2" fill="#c4cefe"/>
                                                    <circle cx="67" cy="23" r="2" fill="#c4cefe"/>
                                                    <rect x="22" y="39" width="20" height="20" rx="2" ry="2"
                                                          fill="none" stroke="#6576ff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <circle cx="32" cy="45.81" r="2" fill="none"
                                                            stroke="#6576ff"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"/>
                                                    <path d="M29,54.31a3,3,0,0,1,6,0" fill="none"
                                                          stroke="#6576ff"
                                                          stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"/>
                                                    <line x1="49" y1="40" x2="69" y2="40" fill="none"
                                                          stroke="#6576ff" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="49" y1="51" x2="69" y2="51" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="49" y1="57" x2="59" y2="57" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="64" y1="57" x2="66" y2="57" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="49" y1="46" x2="59" y2="46" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="64" y1="46" x2="66" y2="46" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                </svg>
                                            </div>
                                            <div class="nk-wg1-text">
                                                <h5 class="title">Personal Info</h5>
                                                <p>See your profile data and manage your Account to choose what
                                                    is
                                                    saved in our system.</p>
                                            </div>
                                        </div>
                                        <div class="nk-wg1-action">
                                            <a href="profile.html" class="link"><span>Manage Your Account</span>
                                                <em
                                                    class="icon ni ni-chevron-right"></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                            <div class="col-md-6">
                                <div class="card card-bordered card-full">
                                    <div class="nk-wg1">
                                        <div class="nk-wg1-block">
                                            <div class="nk-wg1-img">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                    <path
                                                        d="M26,70.78V24.5a7,7,0,0,1,7-7H69a9,9,0,0,1,9,9v49a7,7,0,0,1-7,7H16.55S25.72,78.89,26,70.78Z"
                                                        fill="#fff" stroke="#6576ff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"/>
                                                    <path
                                                        d="M7,30.5H26a0,0,0,0,1,0,0V73.9a8.6,8.6,0,0,1-8.6,8.6H13.6A8.6,8.6,0,0,1,5,73.9V32.5a2,2,0,0,1,2-2Z"
                                                        fill="#e3e7fe" stroke="#6576ff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"/>
                                                    <circle cx="71.5" cy="21" r="13.5" fill="#fff"
                                                            stroke="#6576ff"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"/>
                                                    <rect x="34" y="33.5" width="16" height="8" rx="1" ry="1"
                                                          fill="#c4cefe"/>
                                                    <line x1="35" y1="46.5" x2="67" y2="46.5" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="35" y1="53.5" x2="67" y2="53.5" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="35" y1="59.5" x2="67" y2="59.5" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="35" y1="64.5" x2="67" y2="64.5" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <line x1="35" y1="71.5" x2="51" y2="71.5" fill="none"
                                                          stroke="#c4cefe" stroke-linecap="round"
                                                          stroke-linejoin="round" stroke-width="2"/>
                                                    <path
                                                        d="M75.24,23.79a5.2,5.2,0,0,1-6.42,2.57,5.78,5.78,0,0,1-3.26-7.25,5.25,5.25,0,0,1,6.8-3.47,5.35,5.35,0,0,1,2,1.34l2.75,2.75"
                                                        fill="none" stroke="#6576ff" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"/>
                                                    <polyline points="77.75 16.61 77.75 20.61 73.75 20.61"
                                                              fill="none" stroke="#6576ff"
                                                              stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"/>
                                                </svg>
                                            </div>
                                            <div class="nk-wg1-text">
                                                <h5 class="title">Security Setting</h5>
                                                <p>You have full control to manage your own account and keep
                                                    account
                                                    fully secure.</p>
                                            </div>
                                        </div>
                                        <div class="nk-wg1-action">
                                            <a href="#" class="link"><span>Account Setting</span> <em
                                                class="icon ni ni-chevron-right"></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Dashboard",
    data() {
        return {
            userInfo: {}
        }
    },
    methods: {
        setUser() {
            this.userInfo = {
                name: window.user.full_name,
            };
        },
        submitKyc() {
            window.location.replace(`/kyc`);
        }
    },
    mounted() {
        this.setUser();
    },
}
</script>

