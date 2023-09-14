import { Navbar, Container, Nav } from "react-bootstrap";
import Account from "./Account";
import {useSelector} from "react-redux";

function Header() {

	const {dark, language} = useSelector(state => state.site);

	console.log(dark, language);

	return (
		<Navbar bg="light" expand="lg" className="sticky-top">
			<Container>
				<Navbar.Brand>Logo</Navbar.Brand>
				<Navbar.Toggle aria-controls="navbarScroll" />
				<Navbar.Collapse id="navbarScroll">
					<Nav className="me-auto my-2 my-lg-0" navbarScroll>
					</Nav>
					<Account/>
				</Navbar.Collapse>
			</Container>
		</Navbar>
	);
}

export default Header;
