import {Row, Container, Col} from "react-bootstrap";
import Table from "react-bootstrap/Table";
import {useEffect} from "react";
import {LoadListData} from "../../services/DataListService";
import {useDispatch, useSelector} from "react-redux";
import {setOrders} from '../../stores/actions/orderAction';

export default function Order() {
    const dispatch = useDispatch();
    const orders = useSelector((state) => state.orderReducer.orders);

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await LoadListData('orders');
                dispatch(setOrders(response?.data));
            } catch (error) {
                console.error('Data Loading Issue:', error);
            }
        }

        fetchData();
    }, [dispatch]);

    return (
        <Container className="mt-2 minHeight">
            <Row>
                <Col md={12}>
                    <Table responsive>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Load Type</th>
                            <th>Currency</th>
                            <th>Commodity</th>
                            <th>Departure City</th>
                            <th>Arrival City</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        {orders?.length > 0 ? (
                            orders.map((order) => (
                                <tr key={order.id}>
                                    <td>{order.id}</td>
                                    <td>{order.loadType.name}</td>
                                    <td>{order.currency.name}</td>
                                    <td>{order.commodity}</td>
                                    <td>{order.departureCity.name}</td>
                                    <td>{order.arrivalCity.name}</td>
                                    <td>{order.status}</td>
                                    <td>{order.created_at}</td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan="8">No Data</td>
                            </tr>
                        )}
                        </tbody>
                    </Table>
                </Col>
            </Row>
        </Container>
    )
}