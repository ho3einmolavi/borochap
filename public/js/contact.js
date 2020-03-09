contact_data();

function contact_data() {
    axios({
        url: '/api/setting/index' ,
        method: 'get' ,
    })
        .then(res => {
            console.log(res);
            let obj = res.data[0];
            document.getElementById('mobile').innerHTML = obj.consultant_mobile;
            document.getElementById('66666').innerHTML = obj.consultant_mobile;
            document.getElementById('5555').innerHTML = obj.consultant_number;
            document.getElementById('email').innerHTML = obj.email;
            document.getElementById('info').innerHTML = obj.email_info;
            document.getElementById('account').innerHTML = obj.account_owner;
            document.getElementById('acc_number').innerHTML = obj.account_number;
            document.getElementById('card').innerHTML = obj.card_number;
            document.getElementById('123456').innerHTML = obj.address;
            document.getElementById('123').href = obj.instagram;
            document.getElementById('1234').href = obj.telegram;
        })
        .catch(err => {
            console.log(err.response)
        });

}