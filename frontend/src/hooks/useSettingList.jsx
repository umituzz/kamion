import {useState, useEffect} from "react";
import axios from "axios";

const useSettingList = (url) => {
    const [loading, setLoading] = useState(false);
    const [error, setError] = useState(false);
    const [orders, setOrders] = useState([]);

    useEffect(() => {
        (async () => {
            setLoading(true);
            try {
                const response = await axios.get(url);

                if (response.data) {
                    setOrders([...response.data]);
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

export default useSettingList;
