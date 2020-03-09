<template>
    <div id="app" class="col-xs col-10 col-sm-10 col-md-10 col-lg-9 col-xl-9">
        <div class="col-xs col-sm col- col-md col-lg col-xl-12 users-main delete-padding">
            <div>

                <table class="table table-bordered table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
                    <thead>
                    <tr>
                        <th scope="col">تاریخ</th>
                        <th scope="col">شرح</th>
                        <th scope="col">واریز</th>
                        <th scope="col">برداشت</th>
                        <th scope="col">مانده</th>
                        <th scope="col">شناسه</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="pay in pays">
                        <th scope="row">{{ pay.date }}</th>

                        <td v-if="pay.action === 0 && !pay.order">برداشت از حساب </td>
                        <td v-if="pay.action === 0 && pay.order">برداشت از حساب بابت سفارش شماره: {{ pay.order.code }} </td>
                        <td v-if="pay.action === 1"> واریز به حساب </td>

                        <td v-if="pay.action === 1">{{ pay.amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        <td v-else> - </td>

                        <td v-if="pay.action === 0">{{ pay.amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>
                        <td v-else>-</td>

                        <td>{{ pay.remain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") }}</td>

                        <td>{{ pay.id }}</td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "user-wallet" ,

        data() {
            return {
                pays: []
            }
        } ,

        created() {
            this.get_pays();
        } ,

        methods: {
            get_pays() {
                axios({
                    url: '/api/user/wallet' ,
                    method: 'get' ,
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('token')}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        this.pays = res.data.invoices;
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
        }
    }
</script>

<style scoped>

</style>