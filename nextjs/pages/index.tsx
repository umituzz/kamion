import {Row, Container} from "react-bootstrap";
import Link from "next/link";
import {authCheck} from "../helpers/authHelper";

export default function Home() {
    let display;

    if (!authCheck()) {
        display = 'You should login first'
    } else {
        display = (
            <>
                <Link href="orders">Orders</Link>
                <Link href="orders/create">Create Order</Link>
            </>
        )
    }

    return (
        <Container className="mt-2 minHeight">
            <Row>
                {display}
            </Row>
        </Container>
    )
}