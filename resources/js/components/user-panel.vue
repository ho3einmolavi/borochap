<template>
    <section>
        <center>
            <div class="col-xs col col-sm col-md col-lg col-xl-12 admin-page flex">
                <div class="col-xs col-6 col-sm col-md-2 col-lg-3 col-xl-3 admin-page-sidebar admin delete-padding">
                    <div class="list-group">
                        <a href="" class="list-group-item list-group-item-action active lga-color">داشبورد </a>
                        <router-link to="/user/orders" class="list-group-item list-group-item-action"><i class="fas fa-list-ul"></i> سفارش های من <i class="fas fa-angle-left icon-left"></i></router-link>
                        <router-link to="/user/change-password" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i> تغییر رمز عبور<i class="fas fa-angle-left icon-left"></i></router-link>

                        <router-link to="/user/wallet" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i> حساب مالی <i class="fas fa-angle-left icon-left"></i></router-link>

                        <a onclick="localStorage.removeItem('token'); location.href = '/'" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i> خروج <i class="fas fa-angle-left icon-left"></i></a>
                    </div>
                </div>


                <!---RES---->
                <div class="col-xs col-2 col-sm-2 col-md-1 col-lg col-xl-1 sidebar-res">
                    <div class="list-group">
                        <router-link to="/user/orders" class="list-group-item list-group-item-action"><i class="fas fa-address-card"></i></router-link>
                        <router-link to="/user/change-password" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i></router-link>
                        <router-link to="/user/wallet" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i></router-link>

                        <a onclick="localStorage.removeItem('token'); location.href = '/'" class="list-group-item list-group-item-action"><i class="fas fa-unlock-alt"></i></a>
                    </div>
                </div>
                <!---END-RES--->
                <router-view></router-view>

            </div>

        </center>
    </section>
</template>

<script>
    export default {
        name: "user-panel"
    }
</script>

<style scoped>

</style>