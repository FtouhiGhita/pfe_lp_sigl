function showNotification(icon,message,type,from,align){
    $.notify({
        icon: icon,
        message: message

    }, {
        type: type,
        timer: 1000,
        placement: {
            from: from,
            align: align
        }
    });
}
	