import { useParams, useNavigate } from "react-router-dom";
import { useEffect, useState } from "react";
import axiosClient from "./axios-client"; // verifica percorso
import { useStateContext } from "../contexts/ContextProvider.jsx";

export default function UserForm() {
  const { id } = useParams();
  const navigate = useNavigate();
  const [loading, setLoading] = useState(false);
  const [errors, setErrors] = useState(null);
  const { setNotification } = useStateContext();

  const [user, setUser] = useState({
    id: null,
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
  });

  useEffect(() => {
    if (!id) return;

    setLoading(true);
    axiosClient
      .get(`/users/${id}`)
      .then(({ data }) => {
        setLoading(false);
        setUser(data);
      })
      .catch(() => {
        setLoading(false);
      });
  }, [id]);

  const onSubmit = (ev) => {
    ev.preventDefault();
    setErrors(null);

    if (user.id) {
      axiosClient
        .put(`/users/${user.id}`, user)
        .then(() => {
          setNotification("L'utente è stato aggiornato");
          navigate("/users");
        })
        .catch((err) => {
          const response = err.response;
          if (response && response.status === 422) {
            setErrors(response.data.errors);
          }
        });
    }
  };

  return (
    <>
      <h1>{user.id ? `Aggiorna l'utente: ${user.name}` : "Nuovo utente"}</h1>

      <div className="card animated fadeInDown">
        {loading && <div className="text-center">Caricamento...</div>}

        {errors && (
          <div className="alert">
            {Object.keys(errors).map((key) => (
              <p key={key}>{errors[key][0]}</p>
            ))}
          </div>
        )}

        {!loading && (
          <form onSubmit={onSubmit}>
            <input
              value={user.name}
              onChange={(ev) => setUser({ ...user, name: ev.target.value })}
              placeholder="Nome"
            />

            <input
              type="email"
              value={user.email}
              onChange={(ev) => setUser({ ...user, email: ev.target.value })}
              placeholder="Email"
            />

            <input
              type="password"
              onChange={(ev) => setUser({ ...user, password: ev.target.value })}
              placeholder="Password"
            />

            <input
              type="password"
              onChange={(ev) =>
                setUser({ ...user, password_confirmation: ev.target.value })
              }
              placeholder="Conferma Password"
            />

            <button className="btn">Salva</button>
          </form>
        )}
      </div>
    </>
  );
}
