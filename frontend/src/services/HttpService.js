import axios from "axios";
import {getRequestOptions, postRequestOptions, putRequestOptions} from "./RequestOptions";

export default class HttpService {
    prefix = "api"
    version = "v1"
    base_custom_url = process.env.REACT_APP_BASE_URL;
    url = this.base_custom_url
    postData = async (item, added_url, tokenId = "", contentType = "application/json") => {
        const token = await JSON.parse(localStorage.getItem(tokenId));
        const requestOptions = postRequestOptions(token, item, contentType);

        return fetch(this.url + "/" + added_url, requestOptions).then(
            response => response.json());
    }

    getData = async (added_url, tokenId = "", query = null) => {
        const token = await JSON.parse(window.localStorage.getItem(tokenId));
        const requestOptions = getRequestOptions(token);
        if (query !== null) {
            return fetch(this.url + "/" + added_url + "?" + query, requestOptions).then(
                response => response.json()
            );
        }
        return fetch(this.url + "/" + added_url, requestOptions).then(
            response => response.json()
        );
    }

    listData = async (added_url, tokenId = "", searchParams) => {
        const token = await localStorage.getItem(tokenId);
        const requestOptions = getRequestOptions(token);

        return axios(this.url + "/" + added_url, searchParams, requestOptions).then(
            response => response.json()
        );
    }

    putData = async (item, added_url, tokenId = "", contentType = "application/json") => {
        const token = await JSON.parse(localStorage.getItem(tokenId));

        const requestOptions = putRequestOptions(token, item, contentType);

        return fetch(this.url + "/" + added_url, requestOptions)
            .then(response => response.json());
    }
}