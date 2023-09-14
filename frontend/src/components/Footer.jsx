import {Navbar, Container} from "react-bootstrap";
// import {useSelector} from "react-redux";

const Footer = () => {

    // const {settings} = useSelector(state => state.settings);
    //
    // console.log(settings);

    return (
        <Navbar fixed="bottom" bg="light" variant="light" className="mt-2 py-3">
            <Container className="text-center d-block">
                <span className="text-muted">© 2023 Kamion Inc. All Rights Reserved</span>
            </Container>
        </Navbar>
    );
}

export default Footer;