import {Navbar, Container} from "react-bootstrap";
import {useSelector} from "react-redux";

const Footer = () => {

    const {company, date, footerMessage} = useSelector(state => state.site);

    console.log(company)

    return (
        <Navbar fixed="bottom" bg="light" variant="light" className="mt-2 py-3">
            <Container className="text-center d-block">
                <span className="text-muted">© {date} {company} {footerMessage}</span>
            </Container>
        </Navbar>
    );
}

export default Footer;