

import { useStateContext } from "../contexts/ContextProvider.jsx";

import axiosClient from "./axios-client";


import{Link}from "react-router-dom";

export default function Signup(){
    const nameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const passwordconfirmationRef = useRef();
    const[errors,setErrors] = useState(null)
    const{setUser,setToken} = useStateContext()
    
const onSubmit = (ev)=> {
        ev.preventDefault()
        const payload={
            name: nameRef.current.value,
            email:emailRef.current.value,
            password:passwordRef.current.value,
            passwordConfirmation: passwordConfirmationRef.current.value,
        }
        axiosClient.post('/signup',payload)//reindirizzamento automatico
        .then(({data}) =>{  
         setUser(data.user)
         setToken(data.token)
        })
        .catch(err=>{
          const response = err.response;
          if (response && response.status === 422){
            setErrors(response.data.errors)
          }


        }




        )
}
    return (
     <div className="Login-signup-form animated fadeInDown">
          <div className="form">
          <form onSubmit={onSubmit}>
            <h1 className="title">
                Utente disconesso
                 </h1>
                 {errors && <div className = "alert">
                {Object.keys(errors).map(key=>(
                <p key={key}>{errors[Key][0]}</p>



                ))}


                </div> 
                }
            <input ref={nameRef} placeholder ="Full Name"/>
            <input ref={emailRef} type="email" placeholder="EmailAddress"/>
            <input ref={passwordRef} type="password" placeholder ="Password"/>
            <input ref={passwordConfirmationRef} type="password"  placeholder ="Password Confirmation"/>
            <button className="btn btn-block">Signup</button>
            <p className="message">
                Utente gia' registrato?<Link to='/Login'>Utente disconesso </Link>
            </p>
          </form>



          </div>
          

          </div>


    )
}