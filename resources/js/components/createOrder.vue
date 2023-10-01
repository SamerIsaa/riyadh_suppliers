<template>

    <form method="post" id="form" @submit.prevent="submitForm">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <h3 class="font-bold">{{ $t('landing.create_order') }}</h3>
            </div>
        </div>
        <div class="row" v-for="(selected,index) in form.items" :key="index">

            <div class="col-sm-5">
                <div class="form-group">
                    <label>{{ $t('landing.product_model_code') }} </label>
                    <input class="form-control" type="text" v-model="selected.product_code"/>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="form-group">
                    <label>{{ $t('landing.quantity') }} </label>
                    <input class="form-control" type="number" v-model="selected.quantity"/>
                </div>
            </div>

            <div class="col-md-2">
                <a @click.prevent="deleteRow(index)"
                   class="btn-sm btn btn-light-danger btn-danger">
                    <i class="la la-trash-o"></i>
                    {{ $t('constants.delete') }}
                </a>

            </div>

        </div>


        <div class="form-group form-group-last row">
            <div class="col-lg-4">
                <a @click.prevent="addSelected"
                   class="btn btn-primary btn-sm btn-light-primary btn-add-new-prod">
                    <i class="fa fa-plus"></i>
                    {{ $t('constants.add') }}
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="form-group text-center">
                    <button class="btn btn-success rounded-pill" :disabled="submit">
                        <span v-if="!submit"> {{ $t('constants.save') }}</span>
                        <span v-if="submit" class="spinner-border spinner-border-sm" role="status"
                              aria-hidden="true"></span>

                    </button>
                </div>
            </div>
        </div>
    </form>


</template>

<script>

export default {

    data() {
        return {
            submit: false,
            form: {
                items: []
            }
        }
    },
    props: {
        action: {type: String, default: ""},
    },
    methods: {

        submitForm() {
            this.submit = true;


            axios.post(this.action, this.form)
                .then(response => {

                    toastr.success(response.data.message);
                    if (response.data?.redirect_url) {
                        setTimeout(() => {
                            window.location = response.data.redirect_url;
                        }, 2000)
                    }
                })
                .catch((error) => {
                    if (error.response?.data?.errors && Object.entries(error.response.data.errors).length) {
                        let $error = '<ul style="list-style-type: none">';

                        Object.entries(error.response.data.errors).forEach((e) => {
                            $error += '<li style="font-family: \'Droid Arabic Kufi\' !important">' + e[1][0] + '</li>'
                        })

                        $error += '</ul>'

                        toastr.error($error)
                    } else if (error.response?.data?.message) {
                        toastr.error(error.response?.data?.message)

                    } else {
                        toastr.error(t('messages.error_occurred_during_processing'))

                    }

                })
                .finally(() => {
                    this.submit = false;
                })

        },


        addSelected() {
            this.form.items.push({
                product_code: null,
                quantity: null,
            })
        },
        deleteRow(index) {
            this.form.items.splice(index, 1);
        }
    },

}
</script>
