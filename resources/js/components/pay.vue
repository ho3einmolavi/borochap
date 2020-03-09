<template>
    <div class="container" style="margin-top: 20px">
        {{order_id}}
        <div class="alert alert-danger" v-if="ok === 0">
            <strong>Error! :</strong> {{message}}
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('payment mounted.');
            this.getData();
        } ,

        props: ['status' , 'message' , 'Authority' , 'price' , 'flash' , 'order_id'] ,

        data() {
            return {
                get: [] ,
                ok: ''
            }
        } ,

        methods: {
            sendMessage(template) {
                let data = '';
                if (template === 'borochapCheckout')
                {
                    data = {
                        phone: JSON.parse(localStorage.getItem('user')).phone ,
                        template: template ,
                        code: this.flash.split('_')[1]
                    };
                }
                else
                {
                    data = {
                        phone: JSON.parse(localStorage.getItem('user')).phone ,
                        template:  template,
                        code: this.code
                    };
                }

                axios({
                    url: '/api/sendMessage' ,
                    method: 'post' ,
                    data: data,
                    headers: {
                        Accept: 'application/json' ,
                        Authorization: `Bearer ${localStorage.token}`
                    }
                })
                    .then(res => {
                        console.log(res);
                        open('/' , '_blank');
                    })
                    .catch(err => {
                        console.log(err.response);
                    })
            } ,
            order(status) {
                if (status === 'OK')
                {
                    if (this.flash === 'payment')
                    {
                        axios({
                            url: '/api/create/order' ,
                            method: 'post' ,
                            data: {
                                one_color_toner: this.get.one_color_toner ,
                                circle_cover: this.get.circle_cover ,
                                circulation: this.get.circulation ,
                                thickness: this.get.thickness ,
                                edge: this.get.edge ,
                                Binding: this.get.Binding ,
                                size: this.get.size,
                                material: this.get.material ,
                                one_color_number: this.get.one_color_number ,
                                colorful_number: this.get.colorful_number ,
                                colorful_toner: this.get.colorful_toner ,
                                cover_type: this.get.cover_type ,
                                cover_material: this.get.cover_material ,
                                book_cost: this.get.book_cost ,
                                paid: this.price ,
                                pay_id: this.Authority ,
                                final_price: JSON.parse(localStorage.cost)
                            } ,
                            headers: {
                                Accept: 'application/json' ,
                                Authorization: `Bearer ${localStorage.token}`
                            }
                        })
                            .then(res => {
                                console.log(res);
                                this.ok = 1;
                                this.code = res.data.code;
                                let msg = `${this.code} کد پیگیری سفارش شما `;
                                localStorage.removeItem('final');
                                this.$swal('سفارش شما ثبت شد' , msg , 'success');
                                this.sendMessage('borochap');
                            })
                            .catch(err => {
                                console.log(err.response);
                                this.ok = 0;
                                this.$swal(this.message , 'error'  , 'error');
                                localStorage.removeItem('final');
                            })
                    }
                    if (this.flash.includes('checkout'))
                    {
                        this.$swal('سفارش شما تسویه شد' , 'با تشکر' , 'success');
                        this.sendMessage('borochapCheckout');
                    }

                }
                else if (status === 'NOK')
                {
                    this.ok = 0;
                    this.$swal(this.message , 'error'  , 'error');
                }
            } ,

            getData()
            {
                if (localStorage.final)
                {
                    this.get = JSON.parse(localStorage.final);
                }
                this.order(this.status);
            }
        }
    }
</script>
