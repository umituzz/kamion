import {createSlice} from "@reduxjs/toolkit";

export const site = createSlice({
    name: 'site',
    initialState: {
        company: '',
    },
    reducers: {
        setCompany: state => {
            state.company = 'Kamion';
        },
    }
});

export const {setCompany} = site.actions;

export default site.reducer;