import {configureStore} from '@reduxjs/toolkit'
import SettingReducer from './setting'
import AuthReducer from './auth'

export default configureStore({
    reducer: {
        setting: SettingReducer,
        auth: AuthReducer
    },
})