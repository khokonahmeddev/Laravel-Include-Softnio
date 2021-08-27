<template>
    <div class="nk-header is-light">
        <div class="container wide-xl">
            <div class="nk-header-wrap">
                <div class="nk-menu-trigger mr-sm-2 d-lg-none">
                    <a href="#" @click.prevent="homePage"
                       class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                        class="icon ni ni-menu"></em></a>
                </div>
                <div class="nk-header-brand">
                    <a href="" class="logo-link" @click.prevent="homePage">
                        <img class="logo-light logo-img" src="assets/images/logo.png"
                             srcset="assets/images/logo2x.png 2x"
                             alt="">
                        <img class="logo-dark logo-img" src="assets/images/logo-dark.png"
                             srcset="assets/images/logo-dark2x.png 2x" alt="">
                    </a>
                </div>
                <div class="nk-header-menu" data-content="headerNav">
                    <div class="nk-header-mobile">
                        <div class="nk-header-brand">
                            <a href="" class="logo-link" @click.prevent="homePage">
                                <img class="logo-light logo-img" src="assets/images/logo.png"
                                     srcset="assets/images/logo2x.png 2x"
                                     alt="">
                                <img class="logo-dark logo-img" src="assets/images/logo-dark.png"
                                     srcset="assets/images/logo-dark2x.png 2x" alt="">
                            </a>
                        </div>
                        <div class="nk-menu-trigger mr-n2">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                                class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                    <div class="nk-profile-menu nk-sidebar-widget-full d-lg-none">
                        <a class="nk-profile-toggle toggle-expand" data-target="usermenu-mobile" href="#">
                            <div class="user-card-wrap">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span>AB</span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">{{ userInfo.full_name }}</span>
                                        <span class="sub-text">{{ userInfo.email }}</span>
                                    </div>
                                    <div class="user-action">
                                        <em class="icon ni ni-chevron-right"></em>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Menu -->
                    <ul class="nk-menu nk-menu-main">
                        <li class="nk-menu-item">
                            <a href="" class="nk-menu-link" @click.prevent="homePage">
                                <span class="nk-menu-text">Overview</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="" class="nk-menu-link" @click.prevent="profile">
                                <span class="nk-menu-text">Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nk-header-tools">
                    <ul class="nk-quick-nav">
                        <li class="hide-mb-sm"><a href="" @click.prevent="logout" class="nk-quick-nav-icon"><em
                            class="icon ni ni-signout"></em></a></li>
                        <li class="dropdown user-dropdown order-sm-first">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <div class="user-toggle">
                                    <div class="user-avatar sm">
                                        <em class="icon ni ni-user-alt"></em>
                                    </div>
                                    <div class="user-info d-none d-xl-block">
                                        <div class="user-status user-status-unverified">Unverified</div>
                                        <div class="user-name dropdown-indicator">
                                            {{
                                                userInfo.display_name === 1 ?
                                                    userInfo.full_name : userInfo.name

                                            }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1 is-light">
                                <div class="dropdown-inner user-card-wrap bg-lighter">
                                    <div class="user-card">
                                        <div class="user-avatar">
                                            <span>AB</span>
                                        </div>
                                        <div class="user-info">
                                            <span class="lead-text">{{ userInfo.full_name }}</span>
                                            <span class="sub-text">{{ userInfo.email }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href=""><em
                                            class="icon ni ni-user-alt"></em><span>View Profile</span></a>
                                        </li>
                                        <li><a href="#"><em
                                            class="icon ni ni-setting-alt"></em><span>Account Setting</span></a>
                                        </li>
                                        <li><a href="#"><em
                                            class="icon ni ni-activity-alt"></em><span>Login Activity</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="dropdown-inner">
                                    <ul class="link-list">
                                        <li><a href="" @click.prevent="logout"><em
                                            class="icon ni ni-signout"></em>
                                            <span>Sign out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Navbar",
    data() {
        return {
            userInfo: {}
        }
    },
    methods: {
        setUser() {
            this.userInfo = {
                full_name: window.user.full_name,
                name: window.user.last_name ?? window.user.full_name ,
                email: window.user.email,
                display_name: window.user.display_name,
            };
        },
        logout() {
            axios.get('/logout').then(({data}) => {
                window.location.replace(`/login`);
            })
        },
        homePage() {
            window.location.replace(`/home`);
        },
        profile() {
            window.location.replace(`/profile`);
        }
    },
    mounted() {
        this.setUser();
    },
}
</script>

