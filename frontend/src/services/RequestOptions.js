export const getRequestOptions = (token) => 
{
    return {
        method: "GET",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": "application/json"
        }
    }
}

export const postRequestOptions = (token, item, contentType) => 
{
    return {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": contentType
        },
        body: JSON.stringify(item)
    }
}

export const putRequestOptions = (token, item, contentType) => 
{
    return {
        method: "PUT",
        headers: {
            "Authorization": "Bearer " + token,
            "Content-type": contentType
        },
        body: JSON.stringify(item)
    }
}