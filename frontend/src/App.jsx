import {Routes, Route} from "react-router-dom";
import Header from "./components/Header";
import Footer from "./components/Footer";
import Login from "./pages/Login";
import Home from "./pages/Home";
import Register from "./pages/Register";
import PrivateRoutes from "./components/PrivateRoutes";
import AuthProvider from "./contexts/AuthContext";
import PublicRoutes from "./components/PublicRoutes";
import OrderForm from "./pages/OrderForm";
import Wrapper from "./components/Wrapper";

function App() {
    return (
        <div className="main">
            <AuthProvider>
                <Header/>
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
