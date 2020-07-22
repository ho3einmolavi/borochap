user1();logo();
function user1(){
    axios({url:'/api/user',method:'get',headers:{accept:'application/json',Authorization:`Bearer ${localStorage.token}`},}).then(res=>{console.log(res);

document.getElementById('newdropdown').style.display = 'block';

document.getElementById('fullname').innerText = `${res.data.first_name} ${res.data.last_name}`;

if (res.data.credit_limit)
{
     document.getElementById('credit').innerText = `${res.data.credit_limit.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")} تومان `;
}

localStorage.setItem('user',JSON.stringify(res.data));if(res.data.type==='super admin')
{document.getElementById('33').innerHTML=`
                         <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="#price"><span class="text-white" id="#price">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                        <a href="/important-points"><span class="text-white title-3">  نکات مهم چاپ </span></a>
                        <!--<a onclick="logout()"><span class="text-white title-3 pointer" style="cursor: pointer">  خروج </span></a>-->
                        <a href="/admin" "><span class="text-white title-3">  پنل ادمین </span></a>
                `;document.getElementById('88').innerHTML=`
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
                <li><a href="/important-points" class="ttogle">نکات مهم چاپ</a></li>
                <li><a onclick="logout()" class="ttogle" style="cursor: pointer">خروج</a></li>
                <li><a href="/admin" class="ttogle">پنل ادمین</a></li>
            `;}
else if(res.data.type==='admin')
{document.getElementById('33').innerHTML=`
                         <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="#price"><span class="text-white" id="#price">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                        <a href="/important-points"><span class="text-white title-3">  نکات مهم چاپ </span></a>
                        <a href="/admin/list-order" "><span class="text-white title-3">  لیست سفارشات</span></a>
                `;document.getElementById('88').innerHTML=`
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
                <li><a href="/important-points" class="ttogle">نکات مهم چاپ</a></li>
                <li><a onclick="logout()" class="ttogle" style="cursor: pointer">خروج</a></li>
                <li><a href="/admin/list-order" class="ttogle">لیست سفارشات</a></li>
            `;}
else
{document.getElementById('33').innerHTML=`
                         <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="#price"><span class="text-white" id="#price">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                        <a href="/important-points"><span class="text-white title-3">  نکات مهم چاپ </span></a>
                `;document.getElementById('88').innerHTML=`
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
                <li><a href="/important-points" class="ttogle">نکات مهم چاپ</a></li>
                <li><a onclick="logout()" class="ttogle" style="cursor: pointer">خروج</a></li>
            `;}

            }).catch(err=>{
                 document.getElementById('newdropdown').style.display = 'none';
                console.log(err.response);document.getElementById('88').innerHTML=`
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="/login" class="ttogle">ورود </a></li>
                <li><a href="/register" class="ttogle">ثبت نام</a></li>
                <li><a href="#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
                <li><a href="/important-points" class="ttogle">نکات مهم چاپ</a></li>
            `;document.getElementById('33').innerHTML=`
                        <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="/login"><span class="text-white title-3"> ورود </span></a>
                        <a href="/register"><span class="text-white title-3">  ثبت نام </span></a>
                        <a href="#price"><span class="text-white">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                        <a href="/important-points"><span class="text-white title-3">  نکات مهم چاپ </span></a>
                `;document.getElementById('22').innerHTML=`
                            <span class="round-tab">
                                <img src="/img/icon/register1.png">
                            </span>
            `;})}
function logout(){localStorage.removeItem('token');localStorage.removeItem('user');window.location='/';}
function logo(){axios({url:'/api/logo/show',method:'get'}).then(res=>{document.getElementById('logo').innerHTML=`
                <img src="/files/logo/${res.data}">
            `;}).catch(err=>{console.log(err.response);})}