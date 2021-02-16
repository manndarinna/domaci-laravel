import { divide } from "lodash";
import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Nav extends Component {
    constructor(props) {
        super(props);

        this.state = {
            id_korisnik: this.props.id_korisnik
        };
    }
    dodajTermin(e) {
        e.pereventDefault();
        axios.post("http://127.0.0.1:8000/termini/create", {
            pocinje_at: this.state.pocinje_at,
            naziv_termin: this.state.naziv_termin,
            id_korisnik: this.state.id_korisnik
        });
    }
    promeniState(e) {
        this.setState({ [e.target.name]: e.target.value });
    }
    render() {
        return (
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <a class="navbar-brand" href="http://127.0.0.1:8000/">
                    Calendarly
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#collapsibleNavbar"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-end"
                    id="collapsibleNavbar"
                >
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                id="navbardrop"
                                data-toggle="dropdown"
                            >
                                Izaberite pretragu
                            </a>
                            <div class="dropdown-menu">
                                <a
                                    class="dropdown-item"
                                    href="http://127.0.0.1:8000/termini"
                                >
                                    Po terminima
                                </a>
                                <a
                                    class="dropdown-item"
                                    href="http://127.0.0.1:8000/korisnici"
                                >
                                    Po korisnicima
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        );
    }
}
if (document.getElementById("nav")) {
    ReactDOM.render(<Nav />, document.getElementById("nav"));
}
