import {configureStore} from '@reduxjs/toolkit'
import SettingReducer from './setting'

export default configureStore({
    reducer: {
        setting: SettingReducer
    },
})