const online_ofline = () => {
    // ActiveXObject()
    $.ajax({
        "url" : window.location.origin+"/api/home/online_or_ofline",
        "method" : "POST",
        "data" : {},
        success:function(){}
    });
}
