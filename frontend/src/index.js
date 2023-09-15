import React from 'react';
import ReactDOM from 'react-dom/client';
import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";

import App from './App';
import {BrowserRouter} from "react-router-dom";
import {Provider} from 'react-redux';
import {store} from "./createStore"

const root = ReactDOM.createRoot(document.getElementById('root'));

root.render(
    <React.StrictMode>
        <Provider store={store}>
            <BrowserRouter>
                <App/>
            </BrowserRouter>
        </Provider>
    </React.StrictMode>
);
