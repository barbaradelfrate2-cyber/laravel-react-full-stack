import { createBrowserRouter, Navigate } from "react-router-dom";
import DefaultLayout from "./components/DefaultLayout.jsx";
import GuestLayout from "./components/GuestLayout.jsx";

// Views
import Login from "./views/Login.jsx";
import Signup from "./views/Signup.jsx";
import Dashboard from "./views/Dashboard.jsx";
import Users from "./views/Users.jsx";
import UserForm from "./views/UserForm.jsx";
import NotFound from "./views/NotFound.jsx";

const router = createBrowserRouter([
  // Layout non autenticato
  {
    path: "/",
    element: <GuestLayout />,
    children: [
      { path: "/", element: <Login /> },  // root mostra login
      { path: "/Signup", element: <Signup /> }
    ]
  },

  // Layout autenticato
  {
    path: "/app",
    element: <DefaultLayout />,
    children: [
      { path: "Dashboard", element: <Dashboard /> },
      { path: "users", element: <Users /> },
      { path: "Users/new", element: <UserForm key="userCreate" /> },
      { path: "Users/:id", element: <UserForm key="userUpdate" /> }
    ]
  },

  // Not found
  {
    path: "*",
    element: <NotFound />
  }
]);

export default router;
