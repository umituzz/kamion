import React, {useEffect, useState} from "react";
import axios from "axios";

const AuthProvider = ({}) => {

    const http = axios.create({
        baseURL: 'http://localhost/api',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
        },
        withCredentials: true
    });

    const [loading, setLoading] = useState(false);
    const [currentUser, setCurrentUser] = useState();
    const [loginStorageData, setLoginStorageData] = useState("");
    const [errorMessage, setErrorMessage] = useState("");
    const [successMessage, setSuccessMessage] = useState("");
    const [vError, setVError] = useState("");

    // Resetting all error & success messages
    const resetError = () => {
        setErrorMessage("");
        setSuccessMessage("");
        setSuccessMessage("");
        setLoading(true);
    };


    // User registration function
    const createOrder = async (first_name, last_name, email, password, password_confirmation) => {
        const registerData = {first_name, last_name, email, password, password_confirmation};

        resetError();

        try {
            const response = await http.post("/register", registerData);
            setCurrentUser(response.data);
            localStorage.setItem("userLoginData", JSON.stringify(response.data));
        } catch (error) {
            if (error.response.status === 422) {
                setVError(error.response.data.errors);
            }
        }

        setLoading(false);
    };

    useEffect(() => {
        setLoginStorageData(currentUser || JSON.parse(localStorage.getItem("userLoginData")));
    }, [currentUser]);

    const userData = {
        currentUser,
        loginStorageData,
        userLogin,
        userRegister,
        userLogout,
        vError,
        errorMessage,
        successMessage,
        loading
    };

    return <OrderContext.Provider value={userData}>{children}</OrderContext.Provider>;
};

export default OrderContext;
