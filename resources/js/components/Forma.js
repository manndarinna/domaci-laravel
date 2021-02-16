import React, { Component } from "react";
import ReactDOM from "react-dom";

export default class Forma extends Component {
    constructor(props) {
        super(props);

        this.state = {
            id_korisnik: this.props.id_korisnik
        };
        this.dodajTermin = this.dodajTermin.bind(this);
    }
    dodajTermin(e) {
        e.preventDefault();
        axios.post("http://127.0.0.1:8000/termini/create", {
            id_korisnik: this.state.id_korisnik,
            pocinje_at: this.state.pocinje_at,
            naziv_termin: this.state.naziv_termin
        });
    }
    promeniState(e) {
        this.setState({ [e.target.name]: e.target.value });
    }
    render() {
        return (
            <form onSubmit={this.dodajTermin}>
                <input
                    onChange={this.promeniState.bind(this)}
                    name="pocinje_at"
                    placeholder="23-4-2021"
                    type="datetime-local"
                ></input>

                <input
                    onChange={this.promeniState.bind(this)}
                    name="naziv_termin"
                    placeholder="Naziv"
                    type="text"
                ></input>
                <input
                    value="Dodaj termin"
                    class="btn btn-success"
                    type="submit"
                ></input>
            </form>
        );
    }
}

if (document.getElementById("forma")) {
    const element = document.getElementById("forma");
    const id = element.dataset.id;
    ReactDOM.render(
        <Forma id_korisnik={id} />,
        document.getElementById("forma")
    );
}
