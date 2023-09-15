const initState = {
    dataShow:""
    }
    const DataShowReducer = (state=initState, action) =>{
            switch(action.type){
            
            case 'LOADING':
                    return {
                        ...state,
                        dataShow:'loading'
                    }
            case 'LOAD_DATA_SHOW_SUCCESS':
                    return {
                        ...state,
                        dataShow:action.res,
                    }
            case 'LOAD_DATA_SHOW_ERROR':

                    return {
                        ...state,
                        dataShow:action.res,
                    }
            case 'CODE_ERROR':
                    return {
                        ...state,
                        dataShow:'there seems to be a problem please refresh your browser',
                    }
            default:
                    return state
        }
    }
    
    export default DataShowReducer;