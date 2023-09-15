import { Button, Form, Col } from "react-bootstrap";
import { CreateData } from "../services/DataCreateService";
import { toast } from 'react-toastify';
import 'react-toastify/dist/ReactToastify.css';
import { useEffect, useState } from "react";
import { useDispatch, useSelector } from "react-redux";
import { loadListAction } from '../stores/actions/DataListAction';
import { useNavigate } from "react-router-dom";

const OrderForm = () => {

    const [formData, setFormData] = useState({
        loadType: "",
        commodity: "",
        departureCity: "",
        arrivalCity: "",
        currencyId: "",
    });

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
            // Collect data from form inputs
            const loadType = event.target.elements.loadType.value;
            const commodity = event.target.elements.commodity.value;
            const departureCity = event.target.elements.departureCity.value;
            const arrivalCity = event.target.elements.arrivalCity.value;
            const currencyId = event.target.elements.currencyId.value;

            // Create an object to represent the order data
            const orderData = {
                load_type_id: loadType,
                commodity: commodity,
                departure_city_id: departureCity,
                arrival_city_id: arrivalCity,
                currency_id: currencyId,
            };

            // Make the POST request
            const response = await CreateData("orders", orderData);

            // Handle success or display a toast message
            if (response.status === 201) {
                toast.success("Order created successfully!");

                setFormData({
                    loadType: "",
                    commodity: "",
                    departureCity: "",
                    arrivalCity: "",
                    currencyId: "",
                });

            } else {
                toast.error("Failed to create the order.");
            }

        } catch (error) {
            console.log(error);
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
                    <Form.Select
                        // aria-label="Select Currency"
                        // name="currencyId"
                        // required
                        // value={selectedCurrency}
                        // onChange={(e) => setSelectedCurrency(e.target.value)}
                    >
                        {currencies?.map((currency, index) => (
                            <option key={currency.index} value={currency.id}>
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
