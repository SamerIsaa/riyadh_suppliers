<template>
    <div class="row" v-for="(selected,index) in selected_props" :key="index">
        <div class="col-md-5">
            <div class="form-group">
                <label for="exampleSelect1">{{ $t('panel.properties') }}
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control" v-model="selected.property_id"
                        :title="$t('panel.properties')" @change="selected.option_id = null">
                    <option
                        v-for="property in properties.filter((i) => !selected_property_ids.includes(i.id) || i.id == selected.property_id )"
                        :value="property.id">{{ property.name }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-md-5" v-if="selected.property_id">
            <div class="form-group">
                <label for="exampleSelect1">{{ $t('panel.options') }}
                    <span class="text-danger">*</span>
                </label>
                <select class="form-control" :title="$t('panel.options') " v-model="selected.option_id">
                    <option v-for="option in properties.find((i) => i.id == selected.property_id).options"
                            :value="option.id">{{ option.name }}
                    </option>
                </select>
            </div>
        </div>

        <div class="col-md-2">
            <a @click.prevent="deleteRow(index)"
               class="btn-sm btn btn-light-danger btn-bold">
                <i class="la la-trash-o"></i>
                {{ $t('constants.delete') }}
            </a>

        </div>

    </div>

    <div class="form-group form-group-last row">
        <label class="col-lg-2 col-form-label"></label>
        <div class="col-lg-4">
            <a @click.prevent="addSelected"
               class="btn btn-bold btn-sm btn-light-primary btn-add-new-prod">
                <i class="la la-plus"></i> {{ $t('constants.add') }}
            </a>
        </div>
    </div>
</template>

<script>

export default {
    emits: ['change-properties'],
    data() {
        return {
            selected_props: [
                {
                    property_id: null,
                    option_id: null,
                }
            ]
        }
    },
    props: {
        properties: {type: Object, default: {}},
        selected_properties: {type: Object, default: {}},
    },
    mounted() {
        if (this.selected_properties.length){
            this.selected_props = this.selected_properties;
        }
    },
    methods: {
        addSelected() {
            this.selected_props.push({
                property_id: null,
                option_id: null,
            })
        },
        deleteRow(index) {
            this.selected_props.splice(index, 1);
        }
    },
    watch: {
        // // whenever question changes, this function will run
        // selected_props: function (new_selected_props) {
        //     console.log(this.selected_props)
        //     //
        // }
        selected_props: {
            handler() {
                window.product_props = this.selected_props;
                // this.$emit('change-properties', this.selected_props)
            },
            deep: true,
        },


    },

    computed: {
        selected_property_ids() {
            return this.selected_props.map((i) => i.property_id);
        }
    }
}
</script>
