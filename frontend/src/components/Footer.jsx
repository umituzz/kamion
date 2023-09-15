import {Navbar, Container} from "react-bootstrap";

const Footer = () => {
    return (
        <Navbar fixed="bottom" bg="light" variant="light" className="mt-2 py-3">
            <Container className="text-center d-block">
                test
                <span className="text-muted">© 2023 Kamion All Right Reserved.</span>
            </Container>
        </Navbar>
    );
}

export default Footer;