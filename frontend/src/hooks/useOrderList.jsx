import { useState, useEffect } from "react";
import axios from "axios";

const useOrderList = (url) => {
	const [loading, setLoading] = useState(false);
	const [error, setError] = useState(false);
	const [orders, setOrders] = useState([]);
	const [page, setPage] = useState(1);
	const [lastPage, setLastPage] = useState(0);
	const [total, setTotal] = useState(0);

	useEffect(() => {
		(async () => {
			setLoading(true);
			try {
				const response = await axios.get(url);
				if (response.data) {
					setOrders([...response.data.orders]);
					setLastPage(response.data.lastPage);
					setPage(response.data.page);
					setTotal(response.data.total);
				}
			} catch (error) {
				console.error(error);
				setError(true);
			}
			setLoading(false);
		})();
	}, [url]);

	return { loading, error, orders, total, page, lastPage };
};

export default useOrderList;
