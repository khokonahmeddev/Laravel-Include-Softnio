<template>
    <div class="card card-bordered">
        <div class="card-inner card-inner-lg">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title">Reset password</h5>
                    <div class="nk-block-des">
                        <p>If you forgot your password, well, then we’ll email you instructions to reset your
                            password.</p>
                        <div class="alert alert-success" role="alert" v-if="message">{{ message }}</div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="default-01">Email</label>
                </div>
                <input type="email" class="form-control form-control-lg" id="default-01"
                       placeholder="Enter your email address" v-model="formData.email">
                <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block"
                        type="button"
                        @click.prevent="sendReset">
                    <div class="spinner-border" v-if="loading"></div>
                    <template v-if="!loading">Send Reset Link</template>

                </button>
            </div>
            <div class="form-note-s2 text-center pt-4">
                <a href="" @click.prevent="login"><strong>Return to login</strong></a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ResetPassword",
    data() {
        return {
            loading: false,
            formData: {
                email: ''
            },
            message: '',
            errors: {}
        }
    },
    methods: {
        sendReset() {
            this.loading = true;
            axios.post('password-reset', this.formData).then(({data}) => {
                this.message = data.message;
                this.errors = {}
            }).catch((error) => {
                this.errors = error.response.data.errors;
            }).finally(() => {
                this.loading = false;
                setTimeout(() => {
                    this.message = ''
                }, 1000)
            })
        },
        login() {
            window.location.replace(`/login`);
        }
    }
}
</script>

