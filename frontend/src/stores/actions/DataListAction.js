import {LoadListData} from '../../services/DataListService'

export const loadListAction = (fetchUrl, query = null) => {
    return (dispatch) => {
        dispatch({type: 'LOADING'});
        LoadListData(fetchUrl, query).then((res) => {

                if (res.hasOwnProperty('statusCode') && res.statusCode === 200) {
                    dispatch({type: 'LOAD_DATA_LIST_SUCCESS', res});
                } else if (res.hasOwnProperty('statusCode') && res.statusCode > 300) {
                    dispatch({type: 'LOAD_DATA_LIST_ERROR', res})
                    window.location.href = '/logout'
                }
            },
            error => {
                dispatch({type: 'CODE_ERROR', error});
                setTimeout(() => {
                    window.location.href = '/logout';
                }, 1500)
            }
        )
    }

}