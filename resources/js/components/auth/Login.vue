<template>
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title">Sign-In</h4>
                    <div class="nk-block-des">
                        <p>Access the control panel using your email and passcode.</p>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email or Username</label>
                </div>
                <input type="text" class="form-control form-control-lg"
                       id="default-01"
                       v-model="formData.email"
                       placeholder="Enter your email address or username">
                <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
            </div>
            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="password">Passcode</label>
                    <a class="link link-primary link-sm" href="" @click.prevent="authReset">Forgot Code?</a>
                </div>
                <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                        <em class="passcode-icon icon-show icon ni ni-eye"></em>
                        <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg"
                           id="password"
                           v-model="formData.password"
                           placeholder="Enter your passcode">
                    <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                </div>
            </div>
            <div class="form-group">

                <button class="btn btn-lg btn-primary btn-block" @click.prevent="submit">
                    <div class="spinner-border" v-if="loading"></div>
                    <template v-if="!loading">Sign in</template>
                </button>
            </div>
            <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="" @click.prevent="register">Create
                an account</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            loading: false,
            formData: {},
            errors: {}
        }
    },
    methods: {
        submit() {
            this.loading = true;
            axios.post(`/login`, this.formData).then(({data}) => {
                window.location.replace(`/home`);
            }).catch(({response}) => {
                this.errors = response.data.errors
            }).finally(() => {
                this.loading = false;
            })
        },
        register() {
            window.location.replace(`/register`);
        },
        authReset(){
            window.location.replace(`/auth-reset`);
        }
    }
}
</script>
