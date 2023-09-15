import {createSlice} from "@reduxjs/toolkit";

export const site = createSlice({
    name: 'site',
    initialState: {
        company: 'Kamion Inc.',
        date: 2023,
        footerMessage: 'All Rights Reserved.'
    },
    reducers: {
    //
    }
});

export const {} = site.actions;

export default site.reducer;