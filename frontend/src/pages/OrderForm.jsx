import { Alert, Button, Form, Col } from "react-bootstrap";
import { NavLink } from "react-router-dom";
import { useAuth } from "../contexts/AuthContext";
import { useState } from "react";
const OrderForm = () => {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const { userLogin, errorMessage, vError, loading } = useAuth();

    const handleSubmit = async (event) => {
        event.preventDefault();
        try {
            await userLogin(email, password);
        } catch (error) {
            console.log(error);
        }
    };

    return (
        <Col md={8}>
            <div className="mb-4">
                <h3>Create Order</h3>
            </div>
            <Form onSubmit={handleSubmit}>
                {errorMessage && <Alert variant="danger">{errorMessage}</Alert>}
                <Form.Group className="mb-3" controlId="formBasicEmail">
                    <Form.Label className="text-center">
                        Load Type <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Load Type" required min={3}
                                  // onChange={(event) => setLoadType(event.target.value)}
                    />
                    {vError && <p className="text-danger pt-1">{vError.load_type}</p>}
                </Form.Group>
                <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                        Commodity <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Commodity" required min={3}
                                  // onChange={(event) => setCommodity(event.target.value)}
                    />
                    {vError && <p className="text-danger pt-1">{vError.commodity}</p>}
                </Form.Group>
                <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                        Commodity <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Departure City" required min={3}
                                  // onChange={(event) => setCommodity(event.target.value)}
                    />
                    {vError && <p className="text-danger pt-1">{vError.departure_city}</p>}
                </Form.Group>
                <Form.Group className="mb-3" controlId="formBasicPassword">
                    <Form.Label>
                        Commodity <span className="text-danger">*</span>
                    </Form.Label>
                    <Form.Control type="text" placeholder="Enter Departure City" required min={3}
                        // onChange={(event) => setCommodity(event.target.value)}
                    />
                    {vError && <p className="text-danger pt-1">{vError.arrival_city}</p>}
                </Form.Group>
                <Button variant="outline-primary" type="submit" disabled={loading}>
                    Send
                </Button>
            </Form>
        </Col>
    );
};

export default OrderForm;
