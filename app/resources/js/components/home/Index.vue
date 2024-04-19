<template>
    <div>
        <div v-show="groups.length">
            <ProductBlock v-for="item in groups" :groupId="item.id" :groupName="item.name"></ProductBlock>
        </div>
    </div>
</template>

<script>
import ProductBlock from '../products/ProductBlock.vue';

export default {
    components: { ProductBlock },

    data() {
        return {
            groups: []
        }
    },

    mounted() {
        this.loadGroup()
    },

    methods: {
        loadGroup() {
            this.axios.get(makeUrl('productgroups'), axiosConfig())
                .then(response => {
                    this.groups = response.data.data
                }).catch(error => {
                    console.log(error)
                })
        }
    }
}
</script>
