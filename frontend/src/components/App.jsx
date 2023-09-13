import {Routes, Route} from "react-router-dom";
import Menubar from "./Menubar";
import Footer from "./Footer";
import Login from "../pages/Login";
import Home from "../pages/Home";
import Register from "../pages/Register";
import PrivateRoutes from "./PrivateRoutes";
import AuthProvider from "../contexts/AuthContext";
import PublicRoutes from "./PublicRoutes";
import OrderForm from "../pages/OrderForm";
import Wrapper from "../pages/Wrapper";

function App() {
    return (
        <div className="main">
            <AuthProvider>
                <Menubar/>
                <Routes>
                    <Route path="/*" element={<PrivateRoutes/>}>
                        <Route path="" element={<Home/>}/>
                        <Route path="order" element={<Wrapper children={<OrderForm/>}/>}/>
                    </Route>
                    <Route path="/*" element={<PublicRoutes/>}>
                        <Route path="login" element={<Wrapper children={<Login/>}/>}/>
                        <Route path="register" element={<Wrapper children={<Register/>}/>}/>
                    </Route>
                </Routes>
                <Footer/>
            </AuthProvider>
        </div>
    );
}

export default App;
