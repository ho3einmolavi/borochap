
emergency();
logo();


function emergency() {
    document.getElementById('33').innerHTML = `
                         <a href="/"><span class="text-white title-3">  صفحه اصلی </span></a>
                        <a href="#price"><span class="text-white" id="#price">  محاسبه قیمت  </span></a>
                        <a href="/contact-us"><span class="text-white title-3"> تماس با ما </span></a>
                `;
    document.getElementById('88').innerHTML = `
                 <li><a href="/" class="ttogle">صفحه اصلی </a></li>
                <li><a href="#price" class="ttogle">محاسبه قیمت </a></li>
                <li><a href="/contact-us" class="ttogle">تماس با ما </a></li>
            `;
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