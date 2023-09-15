import {CreateData} from '../../services/DataCreateService'


export const createDataAction = (fetchUrl, query = null, navigate) =>{
    return (dispatch)=>{
        dispatch({type:'LOADING_CREATE'});
        CreateData(fetchUrl, query).then((res)=>{
            if(res.hasOwnProperty('statusCode') && res.statusCode === 201){
                dispatch({type:'DATA_CREATE_SUCCESS', res});
               
               
            }else if(res.hasOwnProperty('statusCode') && res.statusCode > 300) { 
                dispatch({type:'DATA_CREATE_ERROR',res})
                console.log('')
            }
            setTimeout(() => {
                navigate('/matches')
            }, 2500)
        },
        error=>{
            dispatch({type:'CODE_ERROR',error});
            setTimeout(() => {
                navigate('/logout')
            }, 2500)
        }
        )
    }
    
}