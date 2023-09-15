import HttpService from "./HttpService"
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { capitalizeFirstLetter } from "../helpers/stringHandler";

export const UpdateData = async (url, id, query = null) => {
        const http = new HttpService();
        let uri = url + "/" + id;
        const token = "token";
        return http.putData(query, uri, token).then(data => {
            const status_code = data.status_code

            switch (status_code) {
                case 200:
                    toast.success(data.data, {
                        position: toast.POSITION.TOP_RIGHT
                      });
                    break;
                default:
                    const errors = data.data
                    const errorItems = Object.keys(errors).map( (key, i) => {
                        const errorKey = capitalizeFirstLetter(key.replaceAll("_", " "))
                        const error = errors[key];
                        return (
                            <li key={i}>
                              {errorKey}:<br/>
                              {error}
                            </li>
                          )
                    })
                    const errorList = () => {
                        return <ul>
                            {errorItems}
                        </ul>
                    }
                    toast.error(errorList, {
                        position: toast.POSITION.TOP_RIGHT
                      });
                    break;
            }
            return data;
        }).catch((error) => {
            console.error(error);
            return error;
        });
}