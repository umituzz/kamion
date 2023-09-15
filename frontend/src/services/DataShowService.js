import HttpService from "./HttpService"

export const LoadShowData = (url, id, query = null) => {
        const http = new HttpService();
        let uri = url + "/" + id;
        const token = "token";
        return http.getData(uri, token, query).then(data => {
            return data;
        }).catch((error) => {
            console.error(error);
            return error;
        });
}