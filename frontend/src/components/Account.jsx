import {Nav} from "react-bootstrap";
import {NavLink} from "react-router-dom";
import {useAuth} from "../contexts/AuthContext";
import {BoxArrowRight} from "react-bootstrap-icons";
import Loading from "./Loading";

const Account = () => {
    const {loginStorageData, userLogout, loading} = useAuth();
    return (
        <>
            {loading && <Loading/>}
            {loginStorageData ? (
                <>
                    <Nav className="my-2 my-lg-0" navbarScroll onClick={userLogout}>
                        <NavLink className={"nav-link"}>
                            <BoxArrowRight className="pb-1" size={22}/>
                        </NavLink>
                    </Nav>
                </>
            ) : (
                <>
                    <Nav className="ms-auto my-2 my-lg-0" navbarScroll>
                        <NavLink to={"/login"} className={"nav-link"}>
                            Login
                        </NavLink>
                    </Nav>
                    <Nav className="my-2 my-lg-0" navbarScroll>
                        <NavLink to={"/register"} className={"nav-link"}>
                            Register
                        </NavLink>
                    </Nav>
                </>
            )}
        </>
    );
};

export default Account;
