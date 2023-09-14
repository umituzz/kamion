import { Navbar, Container, Nav } from "react-bootstrap";
import { NavLink } from "react-router-dom";
import Account from "./Account";

function Header() {
	return (
		<Navbar bg="light" expand="lg" className="sticky-top">
			<Container>
				<Navbar.Brand>Logo</Navbar.Brand>
				<Navbar.Toggle aria-controls="navbarScroll" />
				<Navbar.Collapse id="navbarScroll">
					<Nav className="me-auto my-2 my-lg-0" navbarScroll>
						<NavLink to={"/order"} className={"nav-link"}>
							Order
						</NavLink>
					</Nav>
					<Account/>
				</Navbar.Collapse>
			</Container>
		</Navbar>
	);
}

export default Header;