import {Dropdown, InputGroup, Row, FormControl, DropdownButton, Container, Button, ButtonGroup} from "react-bootstrap";
import {ArrowLeftSquareFill, ArrowRightSquareFill} from "react-bootstrap-icons";
import {useEffect, useState} from "react";
import Loading from "../components/Loading";
import useOrderList from "../hooks/useOrderList";
import Order from "../components/Order";

function Home() {
    const [searchValue, setSearchValue] = useState("");
    const [orderBy, setOrderBy] = useState("desc");
    const [selectedDate, setSelectedDate] = useState("");
    const [pageNo, setPageNo] = useState(1);
    const [ordersShow, setOrdersShow] = useState([]);

    const api = `http://localhost/api/orders?sort=${orderBy}&date=${selectedDate}&page=${pageNo}`;

    const {orders, lastPage, loading} = useOrderList(api);

    useEffect(() => {
        setOrdersShow([...orders]);
    }, [orders]);

    const handlePagination = (event) => {
        const status = event.target.id;
        if (status === "next") {
            setPageNo(pageNo + 1);
        } else if (status === "prev") {
            setPageNo(pageNo - 1);
        } else if (status === "last") {
            setPageNo(lastPage);
        } else if (status === "first") {
            setPageNo(1);
        } else {
            setPageNo(pageNo);
        }
    };

    return (
        <Container className="mt-2 minHeight">
            {loading && !searchValue && <Loading/>}
            <Row>
                <InputGroup className="my-3">
                    <FormControl type="search" placeholder="Search" value={searchValue}
                                 onChange={(e) => setSearchValue(e.target.value)} className="bg-light"/>
                    <DropdownButton as={InputGroup.Append} variant="outline-secondary" title="Choose Order"
                                    onSelect={(eventKey) => setOrderBy(eventKey)}>
                        <Dropdown.Item eventKey="asc">Ascending</Dropdown.Item>
                        <Dropdown.Item eventKey="desc">Descending</Dropdown.Item>
                    </DropdownButton>
                </InputGroup>
                <Order orders={ordersShow}/>
            </Row>

            {/* Funny custom pagination */}
            {orders.length > 0 && (
                <div className="d-flex justify-content-center mt-4 cmb-5">
                    <ButtonGroup>
                        <Button disabled={pageNo <= 1} id="prev" onClick={handlePagination} variant="primary"
                                className="me-2">
                            <ArrowLeftSquareFill/> {` Prev`}
                        </Button>
                        {pageNo > 1 && (
                            <Button id="first" onClick={handlePagination} variant="primary" className="me-2">
                                1
                            </Button>
                        )}
                        {pageNo < lastPage && (
                            <Button id="last" onClick={handlePagination} variant="primary" className="me-2">
                                {lastPage}
                            </Button>
                        )}
                        <Button disabled={pageNo >= lastPage} id="next" onClick={handlePagination} variant="primary">
                            {`Next `} <ArrowRightSquareFill/>
                        </Button>
                    </ButtonGroup>
                </div>
            )}
        </Container>
    );
}

export default Home;
