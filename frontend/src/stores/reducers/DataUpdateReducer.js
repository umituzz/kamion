const initState = {
    dataUpdate:""
    }
    const DataUpdateReducer = (state=initState, action) =>{
            switch(action.type){
            
            case 'LOADING_UPDATE':
                    return {
                        ...state,
                        dataUpdate: 'loading'
                    }

            case 'DATA_UPDATE_SUCCESS':
                    return {
                        ...state,
                        dataUpdate: action.res,
                    }
    
            case 'DATA_UPDATE_ERROR':

                    return {
                        ...state,
                        dataUpdate: action.res,
                    }
    
            case 'CODE_ERROR':
                            console.log(action)
                    return {
                        ...state,
                        dataUpdate: 'there seems to be a problem please refresh your browser',
                    }
            default:
                    return state
        }
    }
    
    export default DataUpdateReducer;