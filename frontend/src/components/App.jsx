import {Routes, Route} from "react-router-dom";

import Menubar from "./Menubar";
import Footer from "./Footer";
import Login from "../pages/Login";
import Home from "../pages/Home";
import Register from "../pages/Register";
import AuthCommon from "../pages/AuthCommon";
import PrivateRoutes from "./PrivateRoutes";
import AuthProvider from "../contexts/AuthContext";
import PublicRoutes from "./PublicRoutes";
import Order from "./Order";

function App() {
    return (
        <div className="main">
            <AuthProvider>
                <Menubar/>
                <Routes>
                    <Route path="/*" element={<PrivateRoutes/>}>
                        <Route path="" element={<Home/>}/>
                        <Route path="order" element={<Order/>}/>
                    </Route>
                    <Route path="/*" element={<PublicRoutes/>}>
                        <Route path="login" element={<AuthCommon children={<Login/>}/>}/>
                        <Route path="register" element={<AuthCommon children={<Register/>}/>}/>
                    </Route>
                </Routes>
                <Footer/>
            </AuthProvider>
        </div>
    );
}

export default App;
