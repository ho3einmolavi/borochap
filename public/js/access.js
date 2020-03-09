super_access();

function super_access() {
    axios({
        url: '/api/user' ,
        method: 'get' ,
        headers: {
            accept: 'application/json' ,
            Authorization: `Bearer ${localStorage.token}`
        } ,
    })
        .then(res => {
            if (res.data.type !== 'super admin')
            {
                window.stop();
                window.location = '/404'
            }
        })
        .catch(function () {
            window.stop();
            window.location = '/404'
        })
}