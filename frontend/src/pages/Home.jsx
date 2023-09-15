import {Row, Container} from "react-bootstrap";
import {useEffect, useState} from "react";
import useOrderList from "../hooks/useOrderList";
import Order from "../components/Order";
import {useDispatch, useSelector} from "react-redux";
import {useNavigate} from "react-router-dom";
import {loadListAction} from "../stores/actions/DataListAction";

function Home() {
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
                <Order orders={orders}/>
            </Row>
        </Container>
    );
}

export default Home;
