import {combineReducers} from 'redux'
import DataListReducer from './DataListReducer'
import DataCreateReducer from './DataCreateReducer'

const RootReducer = combineReducers({
    dataList: DataListReducer,
    dataCreate: DataCreateReducer,
})

export default RootReducer