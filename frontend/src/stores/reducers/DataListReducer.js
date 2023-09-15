const initState = {
    dataList: ""
}
const DataListReducer = (state = initState, action) => {
    switch (action.type) {

        case 'LOADING':
            return {
                ...state,
                dataList: 'loading'
            }
        case 'LOAD_DATA_LIST_SUCCESS':
            return {
                ...state,
                dataList: action.res,
            }
        case 'LOAD_DATA_LIST_ERROR':

            return {
                ...state,
                dataList: action.res,
            }
        case 'CODE_ERROR':
            return {
                ...state,
                dataList: 'there seems to be a problem please refresh your browser',
            }
        default:
            return state
    }
}

export default DataListReducer;