import {Row, Container, Col} from "react-bootstrap";
import {useEffect, useState} from "react";
import {useDispatch, useSelector} from "react-redux";
import {useNavigate} from "react-router-dom";
import {loadListAction} from "../stores/actions/DataListAction";
import Table from "react-bootstrap/Table";

const Order = () => {
    const dispatch = useDispatch();
    const navigate = useNavigate();
    const [orders, setOrders] = useState([]);

    const data = useSelector(state => state.dataList.dataList);

    useEffect(() => {
        dispatch(loadListAction('orders', navigate()));
    }, [dispatch]);


    useEffect(() => {
        if (data.data) {
            setOrders(data.data);
        }
    }, [data]);

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
    );
}

export default Order;
