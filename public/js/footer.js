get_setting_data();function get_setting_data(){axios({url:'/api/setting/index',method:'get',}).then(res=>{console.log(res);let obj=res.data[0];document.getElementById('address').innerHTML=obj.address;document.getElementById('email_info').innerHTML=obj.email_info;document.getElementById('email_info').innerHTML=obj.email_info;document.getElementById('telegram').href=obj.telegram;document.getElementById('instagram').href=obj.instagram;document.getElementById('footer').innerHTML=obj.footer_text;}).catch(err=>{console.log(err.response)})}