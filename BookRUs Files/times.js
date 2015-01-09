$(document).ready(function(){

$.ajaxSetup({
url:"http://api.nytimes.com/svc/books/v2/lists/names.xml?api-key=8e631d8c34b18f781a0ff85da35b1524:18:70285846",
crossDomain:"true",
success:function(msg){
alert("success");
$("div").html(msg);
},
error:function(x,e){
if(x.status==0){
alert('You are offline!!\n Please Check Your Network.');
}else if(x.status==404){
alert('Requested URL not found.');
}else if(x.status==500){
alert('Internel Server Error.');
}else if(e=='parsererror'){
alert('Error.\nParsing JSON Request failed.');
}else if(e=='timeout'){
alert('Request Time out.');
}else {
alert('Unknow Error.\n'+x.responseText);
}
}
});


$.ajax();

});



http://api.nytimes.com/svc/books/{version}/lists/[dat]{list-name}[.response_format]?[optional-param1=value1]&[...]&api-key={your-API-key}
