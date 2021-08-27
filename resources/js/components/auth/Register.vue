<template>
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Register</h4>
                    <div class="nk-block-des">
                        <p>Create New Account</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <input type="text"
                       class="form-control form-control-lg"
                       id="name"
                       placeholder="Enter your name"
                       v-model="formData.full_name">
                <small class="text-danger" v-if="errors.first_name">{{ errors.first_name[0] }}</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Email or Username</label>
                <input type="text" class="form-control form-control-lg"
                       id="email"
                       placeholder="Enter your email address or username"
                       v-model="formData.email">
                <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
            </div>
            <div class="form-group">
                <label class="form-label" for="password">Passcode</label>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg"
                           id="password"
                           placeholder="Enter your passcode"
                           v-model="formData.password">
                    <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-control-xs custom-checkbox">
                    <input type="checkbox"
                           class="custom-control-input"
                           id="checkbox"
                           v-model="terms">
                    <label class="custom-control-label" for="checkbox">I agree to <a href="#">Privacy Policy</a>
                        &amp; <a href="#"> Terms.</a></label>
                    <small class="text-danger" v-if="errors.terms">{{ errors.terms[0] }}</small>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" @click.prevent="register">
                    <div class="spinner-border" v-if="loading"></div>
                    <template v-if="!loading">Register</template>

                </button>
            </div>
            <div class="form-note-s2 text-center pt-4"> Already have an account?
                <a href="" @click.prevent="login"><strong>Sign in instead</strong></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Register",
    data() {
        return {
            loading: false,
            formData: {
                full_name: ''
            },
            terms: null,
            errors: {}
        }
    },
    methods: {
        register() {
            const {first_name, last_name} = this.names;
            const formData = {...this.formData, first_name, last_name}
            formData.terms = this.terms ? 1 : 0
            this.loading = true;
            axios.post(`register`, formData).then(({data}) => {
                if (data.message) {
                    window.location.replace(`/auth-confirm`);
                }
            }).catch(({response}) => {
                this.errors = response.data.errors;
            }).finally(() => {
                this.loading = false;
            })
        },
        login() {
            window.location.replace(`/login`);
        }
    },
    computed: {
        names() {
            const full_name_spited = this.formData.full_name.split(' ').filter(name => name);
            if (full_name_spited.length) {
                if (full_name_spited.length === 2) {
                    return {
                        first_name: full_name_spited[0],
                        last_name: full_name_spited[1]
                    }
                } else if (full_name_spited.length === 1) {
                    return {
                        first_name: full_name_spited[0],
                        last_name: ''
                    }
                } else if (full_name_spited.length === 3) {
                    return {
                        first_name: `${full_name_spited[0]} ${full_name_spited[1]}`,
                        last_name: full_name_spited[2]
                    }
                } else {
                    return {
                        first_name: full_name_spited[0],
                        last_name: full_name_spited.slice(1, full_name_spited.length).join(' ')
                    }
                }
            }
            return {
                first_name: '',
                last_name: ''
            }
        }
    }
}
</script>

