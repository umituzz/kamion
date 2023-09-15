import HttpService from "./HttpService"

export const LoadListData = (url, query = null) => {
    const http = new HttpService();
    const token = "token";
    return http.getData(url, token, query).then(data => {
        return data;
    }).catch((error) => {
        console.error(error);
        return error;
    });
}