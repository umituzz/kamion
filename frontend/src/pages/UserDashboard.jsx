import {Container, Row} from "react-bootstrap";
import {useAuth} from "../contexts/AuthContext";
import React, {useState} from "react";
import Loading from "../components/Loading";

const UserDashboard = () => {
    const {loginStorageData} = useAuth();
    const [loading] = useState(false);

    return (
        <Container className="mt-3">
            {loading && <Loading/>}
            <h1>Welcome, {loginStorageData.user.name}!</h1>
            <hr/>
            <h5>
                <span>Email: {loginStorageData.user.email}</span>
                <span
                    className="float-end">Account Created: {new Date(loginStorageData.user.created_at).toLocaleDateString()}</span>
            </h5>
            <hr/>
            <Row className="mb-3">
                <h2 className="text-center my-3">Customize your news feed from below sections</h2>
                <hr/>
            </Row>
        </Container>
    );
};

export default UserDashboard;
