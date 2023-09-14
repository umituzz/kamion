import {createSlice} from "@reduxjs/toolkit";

export const auth = createSlice({
    name: 'auth',
    initialState: {
        email: null,
        password: null,
    },
    reducers: {
        register: (state, action) => {
            state.email = action.payload.email;
            state.password = action.payload.email;
        },
        login: (state, action) => {
            state.email = action.payload.email;
            state.password = action.payload.password;
        },
        logout: (state, action) => {
            // state.user = action.payload;
        },
    }
});

export const {register, login, logout} = auth.actions;

export default auth.reducer;