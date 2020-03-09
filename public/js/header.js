user1();logo();function user1(){axios({url:'/api/user',method:'get',headers:{accept:'application/json',Authorization:`Bearer ${localStorage.token}`},}).then(res=>{console.log(res);

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
            if (location.pathname === '/')
            {
                document.getElementById('777').innerHTML=`
                    <div class="col-xs col- col-sm col-md col-lg col-xl-12 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">
                <div class="col-xs col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;margin-left: 55px;">
                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="" style="width: 146px;color: #fff;text-align: center;">
                        قبلی
                    </a>
                </div>
            </div>
            `;
                document.getElementById('77').innerHTML=`
            <div class="col-xs col- col-sm- col-md- col-lg- col-xl-12 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">
                <div class="col-xs col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;margin-left: 120px">
                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="" style="width: 146px;color: #fff;text-align: center;">
                        ادامه
                    </a>
                </div>
            </div>
            `
            }

            }).catch(err=>{
                if (location.pathname === '/')
                {
                    document.getElementById('777').innerHTML=`
                    <div class="col-xs col col-sm col-md col-lg col-xl-12 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">
                        <div class="col-xs col-4 col-sm-3 col-md-2 col-lg-1 col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;margin-left:55px;">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="" style="width: 146px;color: #fff;text-align: center;">
                                قبلی
                            </a>
                        </div>
                    </div>
                    `;
                    document.getElementById('66').innerHTML=`
                    <div class="col-xs col col-sm col-md col-lg col-xl-11 send-input" style="display: flex;align-items: center;justify-content: flex-end;height: 45px;">
                        <div class="col-xs col col-sm col-md col-lg col-xl-1 send-input-inside" style="height: 45px;background-color:#7c1065;;border-radius: 5px;display: flex;align-items: center;justify-content: flex-end;">
                            <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="" style="width: 146px;color: #fff;text-align: center;">
                                ادامه
                            </a>
                        </div>
                    </div>
                    `;
                }
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
                <img src="/logo/${res.data}">
            `;}).catch(err=>{console.log(err.response);})}