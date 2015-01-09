function getData(input){
	
}


function build_api_url(path){
	var request_url="http://api.yelp.com";
	if(path=="search"){
		request_url+="/v2/search?";
	}
	if(path=="business"){
		request_url+="/v2/business?";
	}
	//temporary addition, will change later
	request_url+="term=food&location=San+Francisco";
	return request_url;
}

function make_request(path){
	console.log("askjdla");
	//establish oauth tokens and secret keys
	var oauth= OAuth({
		consumer:{
			public: "obiFqRsVYFCQSY59HzKXIw",
			secret: "sWy2JFRVBAoLmvnVYPapTNbFwzU"
		},
		signature_method: 'HMAC-SHA1'
	});

	var token={
		public: "ub4DcomUEHlkoYP0NoTgOd2zPZ07O9uM",
		secret: "USi4BdVrUHXMUKXdRvXU3kz6Kvk"
	};
	//encode the data so that we can authorize it using 
	var request_data={
		url: build_api_url(path),
		method : 'GET'
	};
	console.log(request_data.url);
	console.log(request_data.meth);
	// finally make the request
	var request=$.ajax({
		url:request_data.url,
		type: request_data.meth,
		data: oauth.authorize(request_data,token)
	}).done(function(data){
		console.log(data);
	});


}