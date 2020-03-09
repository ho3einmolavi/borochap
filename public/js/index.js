get_header();get_off_text();function get_header(){axios({url:'/api/setting/index',method:'get',}).then(res=>{console.log(res);let T='';let obj=res.data[0];let a=document.getElementById('1111');if(document.title==='')
{T=obj.title;}
else
{T=obj.title+" "+'|'+" "+document.title;}
document.title=T;a.setAttribute('content',obj.description);let b=document.getElementById('2222');b.setAttribute('content',obj.keywords);}).catch(err=>{console.log(err.response)});}
function get_off_text(){axios({url:'/api/show/off/type',method:'get',}).then(res=>{console.log(res);document.getElementById('off_text').innerHTML=res.data[0].text}).catch(err=>{console.log(err.response)});}