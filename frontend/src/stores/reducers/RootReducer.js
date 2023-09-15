import { combineReducers } from 'redux'
import DataListReducer from './DataListReducer'
import DataUpdateReducer from './DataUpdateReducer'
import DataCreateReducer from './DataCreateReducer'

const RootReducer = combineReducers({

  dataList: DataListReducer,
  dataUpdate: DataUpdateReducer,
  dataCreate: DataCreateReducer,
})

export default RootReducer