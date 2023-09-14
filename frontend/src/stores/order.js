import {createSlice} from "@reduxjs/toolkit";

export const order = createSlice({
    name: 'order',
    initialState: {
        orders: []
    },
    reducers: {
       setOrders
    }
});

export const {} = order.actions;

export default order.reducer;