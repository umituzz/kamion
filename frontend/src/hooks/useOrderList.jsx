import {useState, useEffect} from "react";
import axios from "axios";

const useOrderList = (url) => {
    const http = axios.create({
        baseURL: 'http://localhost/api',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
        withCredentials: true
    });

    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(false);
    const [orders, setOrders] = useState([]);

    useEffect(() => {
        (async () => {
            setLoading(true);
            try {
                const response = await http.get(url);

                if (response.data.data) {
                    setOrders([...response.data.data]);
                }
            } catch (error) {
                console.error(error);
                setError(true);
            }
            setLoading(false);
        })();
    }, [url]);

    return {loading, error, orders};
};

export default useOrderList;
