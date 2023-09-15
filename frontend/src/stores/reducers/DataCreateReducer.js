const initState = {
    dataCreate:""
    }
    const DataCreateReducer = (state=initState, action) =>{
            switch(action.type){
            
            case 'LOADING_CREATE':
                    return {
                        ...state,
                        dataCreate: 'loading'
                    }

            case 'DATA_CREATE_SUCCESS':
                    return {
                        ...state,
                        dataCreate: action.res,
                    }
    
            case 'DATA_CREATE_ERROR':

                    return {
                        ...state,
                        dataCreate: action.res,
                    }
    
            case 'CODE_ERROR':
                    return {
                        ...state,
                        dataCreate: 'there seems to be a problem please refresh your browser',
                    }
            default:
                    return state
        }
    }
    
    export default DataCreateReducer;