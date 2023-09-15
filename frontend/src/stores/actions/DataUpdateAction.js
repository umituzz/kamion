import {UpdateData} from '../../services/DataUpdateService'


export const updateDataAction = (fetchUrl, id, query = null) =>{
    return (dispatch)=>{
        dispatch({type:'LOADING_UPDATE'});
        UpdateData(fetchUrl, id, query).then((res)=>{
            if(res.hasOwnProperty('statusCode') && res.statusCode === 200){
                 
                dispatch({type:'DATA_UPDATE_SUCCESS',res});
                    
            }else if(res.hasOwnProperty('statusCode') && res.statusCode > 300) { 
                dispatch({type:'DATA_UPDATE_ERROR',res})
            }
        },
        error=>{
            dispatch({type:'CODE_ERROR',error});
            setTimeout(() => {
                props.navigate('/logout')
            }, 1500)
        }
        )
    }
    
}