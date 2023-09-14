import {configureStore} from '@reduxjs/toolkit'
import SiteReducer from './site'

export default configureStore({
    reducer: {
        site: SiteReducer
    },
})