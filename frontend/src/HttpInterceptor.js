import fetchIntercept from 'fetch-intercept';

const HttpInterceptor = (store) => { 
    fetchIntercept.register({
        request: function (url, config) {
            // Modify the url or config here
            return [url, config];
        },

        requestError: function (error) {
            // Called when an error occured during another 'request' interceptor call
            return Promise.reject(error);
        },

        response: function (response) {
            // Modify the reponse object
            if(response.status === 401)
            {
                const path = window.location.href;

                let targetStringArray = path.split("/");
                let targetString = targetStringArray[3]
                if(targetString === "token")
                {
                    localStorage.removeItem("token")
                    window.location.href = "login"
                }
            } 
            return response; 
        },

        responseError: function (error) {
            // Handle an fetch error
            return Promise.reject(error);
        }
    });
}

export default HttpInterceptor