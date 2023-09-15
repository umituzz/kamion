import { Button, Form, Col } from "react-bootstrap";
import { CreateData } from "../services/DataCreateService";
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { loadListAction } from '../stores/actions/DataListAction';
import { useNavigate } from "react-router-dom";

const OrderForm = () => {

    const [currencies, setCurrencies] = useState([]);
    const dispatch = useDispatch();
    const navigate = useNavigate();

    const data = useSelector(state => state.dataList.dataList);

    useEffect(() => {
        dispatch(loadListAction('currencies', navigate()));
    }, [dispatch]);

    useEffect(() => {
        if (data.data) {
            setCurrencies(data?.data)
        }
    }, [data, setCurrencies]);

    const handleSubmit = async (event) => {
        event.preventDefault();

        try {
            const loadType = event.target.elements.loadType.value;
            const commodity = event.target.elements.commodity.value;
            const departureCity = event.target.elements.departureCity.value;
            const arrivalCity = event.target.elements.arrivalCity.value;
            const currencyId = event.target.elements.currencyId.value;

            const orderData = {
                load_type_id: loadType,
                commodity: commodity,
                departure_city_id: departureCity,
                arrival_city_id: arrivalCity,
                currency_id: currencyId,
            };

             await CreateData("orders", orderData);

        } catch (error) {
            toast.error("An error occurred while creating the order.");
        }
    };

    return (
        <Col md={8}>
            <div className="mb-4">
                <h3>Create Order</h3>
            </div>
            <Form onSubmit={handleSubmit}>
                <Form.Group className="mb-3" controlId="loadType">
                    <Form.Label className="text-center">
                        Load Type <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Load Type" required min={3} />
                </Form.Group>
                <Form.Group className="mb-3" controlId="currencyId">
                    <Form.Label className="text-center">
                        Currency <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Select>
                        {currencies?.map((currency, index) => (
                            <option key={index} value={currency.id}>
                                {currency.name}
                            </option>
                        ))}
                    </Form.Select>
                </Form.Group>
                <Form.Group className="mb-3" controlId="commodity">
                    <Form.Label>
                        Commodity <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Commodity" required min={3} />
                </Form.Group>
                <Form.Group className="mb-3" controlId="departureCity">
                    <Form.Label>
                        Departure City <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Departure City" required min={3} />
                </Form.Group>
                <Form.Group className="mb-3" controlId="arrivalCity">
                    <Form.Label>
                        Arrival City <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Arrival City" required min={3} />
                </Form.Group>
                <Button variant="outline-primary" type="submit">
                    Send
                </Button>
            </Form>
        </Col>
    );
};

export default OrderForm;
