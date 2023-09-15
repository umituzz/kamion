import {Navbar, Container, Nav} from "react-bootstrap";
import {NavLink} from "react-router-dom";
import Account from "./Account";

function Header() {
    return (
        <Navbar bg="light" expand="lg" className="sticky-top">
            <Container>
                <NavLink to={"/"} className={"nav-link"}>
                    <Navbar.Brand>Logo</Navbar.Brand>
                </NavLink>
                <Navbar.Collapse id="navbarScroll">
                    <Nav className="me-auto my-2 my-lg-0" navbarScroll></Nav>
                    <Account/>
                </Navbar.Collapse>
            </Container>
        </Navbar>
    );
}

export default Header;
