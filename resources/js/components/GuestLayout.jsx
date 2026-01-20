
import {Outlet,Navigate} from "react-router-dom";
import {useStateContext} from "../contexts/ContextProvider.jsx";
import React from "react";




export default function GuestLayout() {
   const{User,token} = useStateContext();
    if (token) {
         return <Navigate to ="/" />;



    }
   
    return(
        <div id="guestLayout">
            <Outlet/>
         

          </div>
    );
  }
          
          



       



        
        
        
        