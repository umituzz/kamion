import {createSlice} from "@reduxjs/toolkit";

export const setting = createSlice({
    name:'setting',
    initialState:{
        settings: null,
    },
    reducers:{
        setSettings: (state, action) => {
            state.settings = action.payload;
        }
    }
});

export const {setSettings} = setting.actions;

export default setting.reducer;