import {configureStore} from '@reduxjs/toolkit'
import SiteReducer from './site'
import AuthReducer from './auth'

export default configureStore({
    reducer: {
        site: SiteReducer,
        auth: AuthReducer
    },
})