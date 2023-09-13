import { useState, useEffect } from "react";
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
	const [page, setPage] = useState(1);
	const [lastPage, setLastPage] = useState(0);
	const [total, setTotal] = useState(0);

	useEffect(() => {
		(async () => {
			setLoading(true);
			try {
				const response = await http.get(url);

				if (response.data.data.data) {
					setOrders([...response.data.data.data.data]);
					setLastPage(response.data.data.data.last_page);
					setPage(response.data.data.data.current_page);
					setTotal(response.data.data.data.total);
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
