import {useEffect, useState} from 'react';
import {Button, Col, Container, Form, Row} from "react-bootstrap";
import Image from "next/image";
import {LoadListData} from "../../services/DataListService";
import {CreateData} from "../../services/DataCreateService";

export default function CreateOrder() {
    const [currencies, setCurrencies] = useState([]);
    const [loadTypes, setLoadTypes] = useState([]);
    const [cities, setCities] = useState([]);

    useEffect(() => {
        async function fetchData() {
            try {
                const response = await LoadListData('initial');

                setCurrencies(response?.data?.currencies)
                setLoadTypes(response?.data?.loadTypes)
                setCities(response?.data?.cities)

            } catch (error) {
                console.error('Data Loading Issue:', error);
            }
        }
        fetchData();
    }, [])

    const [formData, setFormData] = useState({
        load_type_id: "",
        currency_id: "",
        commodity: "",
        departure_city_id: "",
        arrival_city_id: "",
    });

    const handleChange = (e) => {
        setFormData({...formData, [e.target.name]: e.target.value});
    };

    const handleSubmit = async (event) => {
        event.preventDefault();

        try {
            await CreateData('orders', formData)

            alert('Sipariş başarıyla oluşturuldu');

            setFormData({
                load_type_id: "",
                currency_id: "",
                commodity: "",
                departure_city_id: "",
                arrival_city_id: "",
            });
        } catch (error) {
            console.error('API isteği hatası:', error);
        }
    }

    return (
        <Container>
            <Row>
                <Col md={6}>
                    <Image src="../images/background.svg" alt="bg" className="img-fluid" width={500} height={500}/>
                </Col>
                <Col md={6}>
                    <Form onSubmit={handleSubmit}>
                        <Form.Group className="mb-3" controlId="load_type_id">
                            <Form.Label className="text-center">
                                Load Type <span className="text-danger">*</span>
                            </Form.Label>
                            <Form.Select
                                name="load_type_id"
                                value={formData.load_type_id}
                                onChange={handleChange}
                                required>
                                <option>Choose Load Type</option>
                                {loadTypes?.map((loadType, index) => (
                                    <option key={index} value={loadType.id}>
                                        {loadType.name}
                                    </option>
                                ))}
                            </Form.Select>
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="currency_id">
                            <Form.Label className="text-center">
                                Currency <span className="text-danger">*</span>
                            </Form.Label>
                            <Form.Select
                                name="currency_id"
                                value={formData.currency_id}
                                onChange={handleChange}
                                required>
                                <option>Choose Currency</option>
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
                            <Form.Control
                                type="text"
                                name="commodity"
                                value={formData.commodity}
                                onChange={handleChange}
                                required
                                placeholder="Enter Commodity"
                            />
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="departure_city_id">
                            <Form.Label>
                                Departure City <span className="text-danger">*</span>
                            </Form.Label>
                            <Form.Select
                                name="departure_city_id"
                                value={formData.departure_city_id}
                                onChange={handleChange}
                                required>
                                <option>Choose Departure City</option>
                                {cities?.map((city, index) => (
                                    <option key={index} value={city.id}>
                                        {city.name}
                                    </option>
                                ))}
                            </Form.Select>
                        </Form.Group>
                        <Form.Group className="mb-3" controlId="arrival_city_id">
                            <Form.Label>
                                Arrival City <span className="text-danger">*</span>
                            </Form.Label>
                            <Form.Select
                                name="arrival_city_id"
                                value={formData.arrival_city_id}
                                onChange={handleChange}
                                required>
                                <option>Choose Arrival City</option>
                                {cities?.map((city, index) => (
                                    <option key={index} value={city.id}>
                                        {city.name}
                                    </option>
                                ))}
                            </Form.Select>
                        </Form.Group>
                        <Button variant="outline-primary" type="submit">
                            Create Order
                        </Button>
                    </Form>
                </Col>
            </Row>
        </Container>
    );
}