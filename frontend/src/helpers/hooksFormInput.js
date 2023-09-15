import { useState } from "react";

export const  useFormFields = (initialState) => {
    const [fields, setValues] = useState(initialState);
    return [
        fields,
        function(event) {
            // console.log(event.target.value)
            setValues({
              ...fields,
              [event.target.id]: event.target.value
            });
        }
    ];
}