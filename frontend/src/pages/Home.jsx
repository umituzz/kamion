import {Row, Container} from "react-bootstrap";
import {useEffect, useState} from "react";
import useOrderList from "../hooks/useOrderList";
import Order from "../components/Order";

function Home() {
    const [ordersShow, setOrdersShow] = useState([]);

    const api = `http://localhost/api/orders`;

    const {orders} = useOrderList(api);

    useEffect(() => {
        setOrdersShow([...orders]);
    }, [orders]);

    return (
        <Container className="mt-2 minHeight">
            <Row>
                <Order orders={ordersShow}/>
            </Row>
        </Container>
    );
}

export default Home;
