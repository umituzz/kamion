import Home from "../pages/Home";
import OrderForm from "../pages/OrderForm";
import Login from "../pages/Login";

export const routes = [
    {
        path: '/login',
        exact: true,
        component: Login,
        auth: false
    },
    {
        path: '/register',
        exact: true,
        component: Login,
        auth: false
    },
    {
        path: '/',
        exact: true,
        component: Home,
        auth: true
    },
    {
        path: '/orders',
        exact: true,
        component: OrderForm,
        auth: true
    },
];