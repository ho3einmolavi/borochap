user1();
logo();
function user1() {
    axios({
        url: '/api/user' ,
        method: 'get' ,
        headers: {
            accept: 'application/json' ,
            Authorization: `Bearer ${localStorage.token}`
        } ,
    })
        .then(res => {
            console.log(res);
            localStorage.setItem('user' , JSON.stringify(res.data));
            document.getElementById('33').innerHTML = `
                         <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="/#price"><span class="text-white" id="#price">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                        <a href="/important-points"><span class="text-white title-3">  نکات مهم چاپ </span></a>
                        <a onclick="logout()"><span class="text-white title-3 pointer" style="cursor: pointer">  خروج </span></a>
                `;

            document.getElementById('88').innerHTML = `
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="/#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
                <li><a href="/important-points" class="ttogle">نکات مهم چاپ</a></li>
                <li><a onclick="logout()" class="ttogle" style="cursor: pointer">خروج</a></li>
            `;
        })
        .catch(err => {
            console.log(err.response);
            document.getElementById('88').innerHTML = `
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="/login" class="ttogle">ورود </a></li>
                <li><a href="/register" class="ttogle">ثبت نام</a></li>
                <li><a href="/#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
                <li><a href="/important-points" class="ttogle">نکات مهم چاپ</a></li>
            `;
            document.getElementById('33').innerHTML = `
                        <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="/login"><span class="text-white title-3"> ورود </span></a>
                        <a href="/register"><span class="text-white title-3">  ثبت نام </span></a>
                        <a href="/#price"><span class="text-white">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                        <a href="/important-points"><span class="text-white title-3">  نکات مهم چاپ </span></a>
                `;
        })
}
function logout() {
    localStorage.removeItem('token');
    window.location = '/' ;
}
function logo() {
    axios({
        url: '/api/logo/show' ,
        method: 'get'
    })
        .then(res => {
            document.getElementById('logo').innerHTML = `
                <img src="/logo/${res.data}">
            `;
        })
        .catch(err => {
            console.log(err.response);
        })
}