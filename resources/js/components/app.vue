<template>
    <div class="tab-pane" role="tabpanel" id="step2">

        <router-view :link="flag"></router-view>

    </div>
</template>

<script>
    export default {
        name: "app" ,

        created() {
            this.get_user()
        } ,

        data() {
            return {
                flag: null,
            }
        } ,

        methods: {
            get_user() {
                axios({
                    url:'/api/user' ,
                    method: 'get' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.token}`
                    } ,
                })
                    .then(() => {
                        this.flag = 1;
                    })
                    .catch(err => {
                        console.log(err.response);
                        this.flag = 2;
                    })
            }
        }
    }
</script>

<style scoped>

</style>